<?= $this->extend('admin/layouts/main') ?>
<?= $this->section('content') ?>
<input type="hidden" id="edit_formid" value="<?= $formID ?>"> 

<div class="selectedForm">
    <h2 id='new-form-title' style="text-align:center"><?=$form_name ?></h2>
    <div id="formContainer">
         <?= $view ?>
    </div>   
</div>

<?= $this->endSection() ?>