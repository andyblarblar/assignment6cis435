<?php
$username = 'root';
$password = '';
$connection = new PDO('mysql:host=127.0.0.1;dbname=crud', $username, $password);

// Article Data Transfer Object
class ArticleDTO
{
    public int $id;
    public string $author_name;
    public string $article_text;
}