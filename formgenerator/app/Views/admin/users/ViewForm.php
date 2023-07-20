<?= $this->extend('admin/layouts/main') ?>
<?= $this->section('content') ?>
    <?= $pdfContent ?>

<style>
    #pdf-view{
        margin-top:2%;
    }
</style>
<?= $this->endSection() ?>