<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? 'My App' ?></title>
    <link rel="stylesheet" href="<?= base_url('assets/css/style.css') ?>">
</head>
<body>
    <nav>
        <a href="<?= base_url('/') ?>">Home</a>
        <?php if(session()->get('isLoggedIn')): ?>
            <a href="<?= base_url('/logout') ?>">Logout</a>
        <?php else: ?>
            <a href="<?= base_url('/login') ?>">Login</a>
            <a href="<?= base_url('/register') ?>">Register</a>
        <?php endif; ?>
    </nav>
    <div class="container">
