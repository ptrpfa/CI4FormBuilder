<?= $this->extend('admin/layouts/main') ?>
<?= $this->section('content') ?>
<?php foreach ($view as $input): ?>
        <div class="form-floating d-flex justify-content-center align-items-end mx-auto w-95 user-description">
            <?= $input['group']; ?>
        </div><br>
    <?php endforeach; ?>
    
<div class="selectedForm hide">
    <h2 id='new-form-title' style="text-align:center"></h2>
    <div id="formContainer">
    </div>   
</div>


<input type="hidden" id="csrfToken" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>" />
<?= $this->endSection() ?>