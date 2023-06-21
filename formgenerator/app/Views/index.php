<form>
    <?php foreach ($FormView as $input): ?>
        <div class="form-group">
            <?= $input['label']; ?>
            <?= $input['input']; ?>
        </div><br>
    <?php endforeach; ?>
    <button type="submit">Submit</button>
</form>