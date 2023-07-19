<?= $this->extend('admin/layouts/main') ?>
<?= $this->section('content') ?>

<form class="row g-3 m-3" action="<?=base_url('reset-password')?>" method="post">
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