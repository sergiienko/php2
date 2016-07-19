<?php

use App\Models\News;

define('APP_ROOT', __DIR__);

require APP_ROOT . '/autoload.php';

$view = new \App\View;

$user = new \App\Models\User();
$user->getEmail();

$view->title = 'Title';
$view->description = 'About news';
$view->users = \App\Models\User::findAll();

$view->display(__DIR__ . '/App/templates/index.php');

/*$user = new \App\Models\User();
$user->id = 8;
$user->email = 'AlisaHarrison@inbound.plus';
$user->name = 'Alisa Harrison';
$user->save();

//var_dump($user);

if (isset($_POST['action'])) {
    $article = new News();
    if (isset($_POST['article']['id'])) {
        $article->id = $_POST['article']['id'];
    }
    switch($_POST['action']) {
        case 'add':
        case 'edit':
            $article->title = $_POST['article']['title'];
            $article->text = $_POST['article']['text'];
            $article->save();
            break;
        
        case 'delete':
            $article->delete();
            break;
    }
}

if (isset($_GET['id'])) {
    $article = News::findById($_GET['id']);
    if (!empty($article)) {
        include __DIR__ . '/App/Views/article.html';
    }
} else {
    $news = News::getRecent();
    include __DIR__ . '/App/Views/news.html';
}*/


