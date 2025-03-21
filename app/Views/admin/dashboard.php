<?= $this->include('layouts/header') ?>
<h2>Admin Dashboard</h2>
<p>Welcome, Admin! Here are your stats:</p>
<ul>
    <li>Total Users: <?= $totalUsers ?></li>
    <li>Last Login: <?= session()->get('last_login') ?></li>
</ul>
<?= $this->include('layouts/footer') ?>
