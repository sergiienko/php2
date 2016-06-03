<?php

use App\Models\News;

require __DIR__ . '/autoload.php';

if (isset($_GET['id'])) {
    $article = News::findById($_GET['id']);
    if (!empty($article)) {
        include __DIR__ . '/App/Views/article.html';
    }
} else {
    $news = News::getRecent();
    include __DIR__ . '/App/Views/news.html';
}


