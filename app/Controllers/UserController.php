<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\UserEducationModel;
use App\Models\UserEmploymentModel;
use CodeIgniter\RESTful\ResourceController;

class UserController extends ResourceController
{
    public function updateProfile($id)
    {
        $userModel = new UserModel();
        $educationModel = new UserEducationModel();
        $employmentModel = new UserEmploymentModel();

        // Validate user exists
        $user = $userModel->find($id);
        if (!$user) {
            return $this->response->setJSON(['error' => 'User not found'])->setStatusCode(404);
        }

        $json = $this->request->getJSON();
        $data = [
            'first_name' => $json->first_name ?? $user['first_name'],
            'last_name' => $json->last_name ?? $user['last_name'],
            'email' => $json->email ?? $user['email']
        ];

        // **Profile Image Upload**
        $file = $this->request->getFile('profile_image');
        if ($file && $file->isValid() && !$file->hasMoved()) {
            $newName = $file->getRandomName();  // Generate unique name
            $file->move('writable/uploads', $newName); // Move file to upload folder
            $data['profile_image'] = $newName;
        }

        // Update user details
        $userModel->update($id, $data);

        // Update Education Details
        if (!empty($json->education)) {
            $educationModel->where('user_id', $id)->delete();
            foreach ($json->education as $edu) {
                $educationModel->insert([
                    'user_id' => $id,
                    'degree' => $edu->degree,
                    'university' => $edu->university,
                    'year_of_passing' => $edu->year_of_passing
                ]);
            }
        }

        // Update Employment Details
        if (!empty($json->employment)) {
            $employmentModel->where('user_id', $id)->delete();
            foreach ($json->employment as $job) {
                $employmentModel->insert([
                    'user_id' => $id,
                    'company_name' => $job->company_name,
                    'position' => $job->position,
                    'start_date' => $job->start_date,
                    'end_date' => $job->end_date
                ]);
            }
        }

        return $this->response->setJSON(['message' => 'Profile updated successfully']);
    }
    public function getUserDetails($id)
{
    $userModel = new UserModel();
    $educationModel = new UserEducationModel();
    $employmentModel = new UserEmploymentModel();

    // Fetch User
    $user = $userModel->find($id);
    if (!$user) {
        return $this->response->setJSON(['error' => 'User not found'])->setStatusCode(404);
    }

    // Fetch Education and Employment Details
    $user['education'] = $educationModel->where('user_id', $id)->findAll();
    $user['employment'] = $employmentModel->where('user_id', $id)->findAll();

    // Attach full image URL
    if (!empty($user['profile_image'])) {
        $user['profile_image_url'] = base_url('writable/uploads/' . $user['profile_image']);
    } else {
        $user['profile_image_url'] = null;
    }

    return $this->response->setJSON($user);
}

}
