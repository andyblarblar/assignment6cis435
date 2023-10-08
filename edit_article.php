<?php
include('db.php');
include('function.php');

// Require id in query params
$id = $_GET["id"];

$statement = $connection->prepare(
    "SELECT * FROM articles WHERE id=:id"
);

$statement->execute(array(
    ":id" => $id
));

// Grab article info
$article = $statement->fetchObject("ArticleDTO");
?>

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
    }).then((editors) => {
            for (let ed of editors) {
                // Inject article text into RTE
                ed.setContent('<?= $article->article_text ?>')
            }
        }
    )
</script>

<body>
<form action="insert.php" method="post" enctype="multipart/form-data">
    <!-- Discriminate add vs edit via hidden inputs-->
    <input type="hidden" name="operation" value="Edit">
    <input type="hidden" name="article_id" value="<?= $id ?>">

    <label for="author_name">Author name:</label>
    <input type="text" value="<?= $article->author_name ?>" name="author_name">
    <br>
    <label for="mytextarea">Article body:</label>
    <input type="textarea" id="mytextarea" name="article_text">
    <input type="submit" value="submit">
</form>
</body>
</html>
