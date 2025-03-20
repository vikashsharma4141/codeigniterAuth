<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Controller;

class AuthController extends Controller
{
    public function register()
    {
        $userModel = new UserModel();
        $data = [
            'first_name' => $this->request->getPost('first_name'),
            'last_name'  => $this->request->getPost('last_name'),
            'email'      => $this->request->getPost('email'),
            'password'   => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
            'role'       => 'customer',  // Default role
            'profile_image' => null,
            'last_login' => null,
        ];

        if ($userModel->insert($data)) {
            return $this->response->setJSON(['status' => 'success', 'message' => 'User registered successfully.']);
        } else {
            return $this->response->setJSON(['status' => 'error', 'message' => 'Registration failed.']);
        }
    }

    public function login()
    {
        $userModel = new UserModel();
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        $user = $userModel->where('email', $email)->first();

        if ($user && password_verify($password, $user['password'])) {
            session()->set([
                'user_id' => $user['id'],
                'user_email' => $user['email'],
                'user_role' => $user['role'],
                'logged_in' => true,
            ]);

            // Update last login timestamp
            $userModel->update($user['id'], ['last_login' => date('Y-m-d H:i:s')]);

            return $this->response->setJSON(['status' => 'success', 'message' => 'Login successful.']);
        } else {
            return $this->response->setJSON(['status' => 'error', 'message' => 'Invalid email or password.']);
        }
    }

    public function logout()
    {
        session()->destroy();
        return $this->response->setJSON(['status' => 'success', 'message' => 'Logged out successfully.']);
    }

    public function checkSession()
    {
        if (session()->has('logged_in') && session('logged_in') === true) {
            return $this->response->setJSON(['status' => 'success', 'message' => 'User is logged in.']);
        } else {
            return $this->response->setJSON(['status' => 'error', 'message' => 'User is not logged in.']);
        }
    }
}
