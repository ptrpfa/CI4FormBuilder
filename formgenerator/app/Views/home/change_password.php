<?= $this->extend('admin/layouts/main') ?>
<?= $this->section('content') ?>

<?php if (session('error') !== null) : ?>
    <div class="alert alert-danger" role="alert"><?= session('error') ?></div>
<?php elseif (session('errors') !== null) : ?>
    <div class="alert alert-danger" role="alert">
        <?php if (is_array(session('errors'))) : ?>
            <?php foreach (session('errors') as $error) : ?>
                <?= $error ?>
                <br>
            <?php endforeach ?>
        <?php else : ?>
            <?= session('errors') ?>
        <?php endif ?>
    </div>
<?php endif ?>

<?php if (session('message') !== null) : ?>
<div class="alert alert-success" role="alert"><?= session('message') ?></div>
<?php endif ?>

<form class="row g-3 m-3" action="<?=base_url('change-password')?>" method="post">
    <?= csrf_field() ?>
    <div class="col-md-12">
        <label for="email" class="form-label">Email</label>
        <input class="form-control" type="email" name="email">
    </div>
    <div class="col-md-12">
        <label for="password" class="form-label">Current Password</label>
        <input class="form-control" type="password" name="password">
    </div>
    <div class="col-md-12">
        <label for="new_password" class="form-label">New Password</label>
        <input class="form-control" type="password" name="new_password">
    </div>
    <div class="col-12">
        <input type="submit" name="submit" value="Reset" class="btn btn-primary">
    </div>
</form>

<?= $this->endSection() ?>