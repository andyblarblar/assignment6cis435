<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create Article</title>
    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
</head>

<script>
    tinymce.init({
        selector: '#mytextarea'
    });
</script>

<body>
<form action="insert.php" method="post" enctype="multipart/form-data">
    <!-- Discriminate add vs edit via hidden inputs-->
    <input type="hidden" name="operation" value="Add">

    <label for="author_name">Author name:</label>
    <input type="text" name="author_name">
    <br>
    <label for="mytextarea">Article body:</label>
    <input type="textarea" id="mytextarea" name="article_text">
    <input type="submit" value="submit">
</form>
</body>
</html>
