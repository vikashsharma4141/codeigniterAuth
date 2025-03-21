<?= $this->include('layouts/header') ?>
<h2>Login</h2>
<form action="<?= base_url('login') ?>" method="post">
    <input type="email" name="email" placeholder="Email" required><br>
    <input type="password" name="password" placeholder="Password" required><br>
    <button type="submit">Login</button>
</form>
<?= $this->include('layouts/footer') ?>
