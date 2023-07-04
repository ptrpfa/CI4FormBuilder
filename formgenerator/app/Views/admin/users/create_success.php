<?= $this->extend('admin/layouts/main') ?>
<?= $this->section('content') ?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h2>Form Submitted Successfully!</h2>
            <p>Form ID: <?= $formID ?></p>
            <a href="<?= base_url('users') ?>" class="btn btn-primary">Go Back</a>
        </div>
    </div>
</div>

<?= $this->endSection() ?>
