<?= $this->extend('admin/layouts/main') ?>
<?= $this->section('content') ?>

<form class="row g-3 m-3" action="<?=base_url('set-password')?>" method="post">
    <?= csrf_field() ?>
    <div class="col-md-12">
        <label for="password" class="form-label">New Password</label>
        <input class="form-control" type="password" name="password">
    </div>
    <div class="col-12">
        <input type="submit" name="submit" value="Update" class="btn btn-primary">
    </div>
</form>

<?= $this->endSection() ?>