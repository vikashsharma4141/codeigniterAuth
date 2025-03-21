<?php if (session()->has('message')): ?>
    <div class="alert alert-<?= session()->getFlashdata('message_type'); ?>">
        <?= session()->getFlashdata('message'); ?>
    </div>
<?php endif; ?>
