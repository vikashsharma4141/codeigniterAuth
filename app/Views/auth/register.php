<?= $this->include('layouts/header') ?>
<h2>Register</h2>
<form action="<?= base_url('register') ?>" method="post">
    <input type="text" name="first_name" placeholder="First Name" required><br>
    <input type="text" name="last_name" placeholder="Last Name" required><br>
    <input type="email" name="email" placeholder="Email" required><br>
    <input type="password" name="password" placeholder="Password" required><br>
    <button type="submit">Register</button>
</form>
<?= $this->include('layouts/footer') ?>
