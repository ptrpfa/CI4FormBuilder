<?= $this->extend('admin/layouts/main') ?>
<?= $this->section('content') ?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h2>Deleted Form Response Successfully!</h2>
            <p>Response ID: <?= $responseID ?></p>
            <a href="<?= base_url('users') ?>" class="btn btn-primary">Go Back</a>
        </div>
    </div>
</div>

<?= $this->endSection() ?>
