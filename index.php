<?php

require 'includes/init.php';

$conn = require 'includes/db.php';

//this is equal
// $paginator = new Paginator(isset($_GET['page']) ? $_GET['page'] : 1, 4);
//to this
$paginator = new Paginator($_GET['page'] ?? 1, 4, Article::getTotal($conn));

$articles = Article::getPage($paginator->limit, $paginator->offset, $conn);

?>
<?php require 'includes/header.php'; ?>

<?php if (empty($articles)): ?>
<p>No articles found.</p>
<?php else: ?>

<ul>
    <?php foreach ($articles as $article): ?>
    <li>
        <article>
            <h2><a href="article.php?id=<?= $article['id']; ?>"><?= htmlspecialchars($article['title']); ?></a></h2>
            <p><?= htmlspecialchars($article['content']); ?></p>
        </article>
    </li>
    <?php endforeach; ?>
</ul>

<?php require 'includes/pagination.php'; ?>

<?php endif; ?>

<?php require 'includes/footer.php'; ?>