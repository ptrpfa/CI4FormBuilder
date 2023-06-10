<!DOCTYPE html>
<html>
<head>
    <title>Create Form Template</title>
</head>
<body>
    <form action="/admin/createFormTemplate" method="post">
        <!-- Provide a field input for the form template -->
        <label>Fields (JSON Format):</label>
        <textarea name="fields" rows="5" cols="50" required></textarea>
        <br>
        <button type="submit">Create Form Template</button>
    </form>
</body>
</html>