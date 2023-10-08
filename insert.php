<?php
include('db.php');
include('function.php');
if (isset($_POST["operation"])) {
    if ($_POST["operation"] == "Add") {
        $statement = $connection->prepare("
				INSERT INTO articles (author_name, article_text) 
				VALUES (:author_name, :article_text)
			");
        $result = $statement->execute(
            array(
                ':author_name' => $_POST["author_name"],
                ':article_text' => $_POST["article_text"],
            )
        );
        if (!empty($result)) {
            header("location: view_article.php?id=" . $connection->lastInsertId());
        }
    }
    if ($_POST["operation"] == "Edit") {
        $statement = $connection->prepare(
            "UPDATE articles 
				SET author_name = :author_name, article_text = :article_text
				WHERE id = :id
				"
        );
        $result = $statement->execute(
            array(
                ':author_name' => $_POST["author_name"],
                ':article_text' => $_POST["article_text"],
                ':id' => $_POST["article_id"]
            )
        );
        if (!empty($result)) {
            header("location: view_article.php?id=" . $_POST["article_id"]);
        }
    }
}