<?= $this->extend('admin/layouts/main') ?>
<?= $this->section('content') ?>
    <?= $pdfContent ?>

<style>
    #pdf-view{
        margin-top:5%;
    }
</style>
<?= $this->endSection() ?>