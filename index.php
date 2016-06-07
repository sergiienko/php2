<?php

use App\Models\News;

define('APP_ROOT', __DIR__);

require APP_ROOT . '/autoload.php';


$user = new \App\Models\User();
$user->id = 8;
$user->email = 'AlisaHarrison@inbound.plus';
$user->name = 'Alisa Harrison';
$user->save();

var_dump($user);

if (isset($_GET['id'])) {
    $article = News::findById($_GET['id']);
    if (!empty($article)) {
        include __DIR__ . '/App/Views/article.html';
    }
} else {
    $news = News::getRecent();
    include __DIR__ . '/App/Views/news.html';
}


