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
<style>
    .content{
        margin-left:25%;
        text-align:center;
    }
    #new-form-title{
        margin-right:20%;
    }
</style>
<?= $this->endSection() ?>