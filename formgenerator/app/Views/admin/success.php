<?= $this->extend('admin/layouts/main') ?>
<?= $this->section('content') ?>
<div class="d-flex justify-content-center">
    <div class="card text-center">
        <div class="card-header bg-success">
            <h4 class="text-white">Success!</h4>
        </div>
        <div class="card-body jumbotron m-3">
            <h5><?= $message ?></h5>
        </div>
    </div>
</div>
<?= $this->endSection() ?>