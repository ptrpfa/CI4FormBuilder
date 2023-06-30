<?= $this->extend('admin/layouts/main') ?>
<?= $this->section('content') ?>

<form class="row g-3 m-3" action="<?=base_url('/template/create')?>" method="post">
    <?= csrf_field() ?>
    <div class="col-12">
        <label for="form_name" class="form-label">Form Name</label>
        <input class="form-control" type="text" name="form_name">
    </div>
    <div class="col-md-6">
        <label for="form_status" class="form-label">Status</label>
        <input class="form-control" type="email" name="form_status">
    </div>
    <div class="col-md-6">
        <label for="form_version" class="form-label">Version</label>
        <input class="form-control" type="number" step="0.01" min="0" name="form_version">
    </div>
    <div class="col-12">
        <label for="form_description" class="form-label">Description</label>
        <input class="form-control" type="text" name="form_description">
    </div>
    <div class="col-12">
        <label for="form_structure" class="form-label">Structure</label>
        <textarea  class="form-control" name="form_structure" cols="45" rows="10"></textarea>
    </div>
    <div class="col-12">
        <input type="submit" name="submit" value="Create Form" class="btn btn-primary">
    </div>
</form>

<?= $this->endSection() ?>