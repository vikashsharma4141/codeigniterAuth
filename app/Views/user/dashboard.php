<?= $this->include('layouts/header') ?>
<h2>User Dashboard</h2>
<p>Welcome, <?= session()->get('first_name') ?>!</p>
<p>Your Email: <?= session()->get('email') ?></p>
<p>Last Login: <?= session()->get('last_login') ?></p>
<?= $this->include('layouts/footer') ?>
