<form>
    <?php foreach ($FormView as $input): ?>
        <div class="form-floating">
            <?= $input['group']; ?>
        </div><br>
    <?php endforeach; ?>
    <button type="submit">Submit</button>
</form>