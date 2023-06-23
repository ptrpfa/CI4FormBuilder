<?= session()->getFlashdata('error') ?>
<?= validation_list_errors() ?>

<form action="survey" method="post">
    <?= csrf_field() ?>
    <?php foreach ($fields as $field): ?>
        <div class="form-floating">
            <?= $field['group']; ?>
        </div><br>
    <?php endforeach; ?>
    <button type="submit">Submit</button>
</form>