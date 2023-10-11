<?php
include('db.php');
include('function.php');

$title = $_GET["title"];
$id = $_GET["id"];

$statement = $connection->prepare(
    "SELECT * FROM articles WHERE id=:id"
);

$statement->execute(array(
    ":id" => $id
));

// Grab article info
$article = $statement->fetchObject("ArticleDTO");
$swap_var = array(
    "{NAME}" => $article->author_name,
    "{TEXT}" => $article->article_text
);

if (file_exists("template.php")) {
    $html = file_get_contents("template.php");
} else {
    die ("Unable to locate template file");
}

foreach (array_keys($swap_var) as $key) {
    if (strlen($key) > 2 && trim($swap_var[$key]) != '')
        $html = str_replace($key, $swap_var[$key], $html);
}

if (!file_exists($title)) {
    file_put_contents("static/" . $title . ".html", $html);
}
header("location: index.php");
?>