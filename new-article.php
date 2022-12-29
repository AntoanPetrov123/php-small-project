<?php

require 'classes/Database.php';
require 'classes/Article.php';
require 'includes/url.php';
require 'classes/Auth.php';

session_start();

if (!Auth::isLoggedIn()) {
    die("unauthorised");
}

$article = new Article();

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $db = new Database();
    $conn = $db->getConn();

    $article->title = $_POST['title'];
    $article->content = $_POST['content'];
    $article->published_at = $_POST['published_at'];

    if ($article->create($conn)) {
        redirect("/article.php?id={$article->id}");
    }
}

?>
<?php require 'includes/header.php'; ?>

<h2>New article</h2>

<?php require 'includes/article-form.php'; ?>

<?php require 'includes/footer.php'; ?>