<?= $this->extend('admin/layouts/main') ?>
<?= $this->section('content') ?>
<?= session()->getFlashdata('error') ?>
<?= validation_list_errors() ?>
<form class="row g-3 m-3" action="<?=base_url('/template/create')?>" method="post">
    <?= csrf_field() ?>
    <div class="col-12">
        <label for="form_name" class="form-label">Form Name</label>
        <input class="form-control" type="text" name="form_name">
    </div>
    <div class="col-md-6">
        <label for="form_status" class="form-label">Status</label>
        <select class="form-select" name="form_status">
            <option value="1" selected>Active</option>
            <option value="0">Inactive</option>
        </select>
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
        <label for="form_template" class="form-label">Structure (from predefined template)</label>
        <select class="form-select" id="NewFormSelector" name="form_template">
            <option disabled selected value="null">Select form template</option>
            <?php foreach($form_templates as $template): ?>
                <option value="<?= $template?>"><?= $template?></option>
            <?php endforeach ?>
        </select>
    </div>
    <div class="col-12">
        <label for="form_structure" class="form-label">Structure (HTML dump)</label>
        <textarea id="formHMTL" class="form-control" name="form_structure" cols="45" rows="10" disabled></textarea>
    </div>
    <div class="col-12" style="display:flex; justify-content:space-between;">
        <input type="submit" name="submit" value="Create Form" class="btn btn-success"></input>
        <button type="submit" id="form_preview" class="btn btn-primary hide">Preview Form</button>
    </div>
</form>

<?= $this->endSection() ?>