<?= $this->extend('admin/layouts/main') ?>
<?= $this->section('content') ?>
<?php foreach ($view as $input): ?>
        <div class="form-floating  username-group">
            <?= $input; ?>
        </div><br>
    <?php endforeach; ?>
    
<div class="selectedForm">
    <h2 id='new-form-title' style="text-align:center"></h2>
    <div id="formContainer">
    </div>   
</div>
<style>
    .username-group{
        margin-left:22%;
    }
    .content{
        text-align:center;
    }
    #new-form-title{
        margin-right:18%;
        margin-bottom:5%;

    }
</style>
<?= $this->endSection() ?>