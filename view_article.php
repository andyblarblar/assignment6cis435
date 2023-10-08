<?php //TODO make this a smarty template
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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <title>Article</title>
</head>


<body>
<a id="add_button" data-toggle="modal" data-target="#userModal"
   class="btn btn-info btn-lg" href="edit_article.php?id=<?= $article->id ?>">
    Edit This Article
</a>

<p>
    <b>Author name:</b> <?= $article->author_name ?>
</p>

<div class="container">
    <?= $article->article_text ?>
</div>
</body>
</html>