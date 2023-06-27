<?= $this->extend('admin/layouts/main') ?>
<?= $this->section('content') ?>
<?php foreach ($view as $input): ?>
        <div class="form-floating">
            <?= $input['group']; ?>
        </div><br>
    <?php endforeach; ?>
    
<div class="selectedForm">
    <h2 id='new-form-title' style="text-align:center"></h2>
    <div id="formContainer">
    </div>   
</div>

<?= $this->endSection() ?>