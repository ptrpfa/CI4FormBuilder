<?= $this->extend('admin/layouts/main') ?>
<?= $this->section('content') ?>
<?php if (session()->getFlashdata('success')) : ?>
    <script>
        alert("<?php echo session()->getFlashdata('success'); ?>");
    </script>
<?php endif; ?>
<?= $table ?>
<?= $this->endSection() ?>