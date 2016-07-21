<?php

use App\Models\News;

define('APP_ROOT', __DIR__);

require APP_ROOT . '/vendor/autoload.php';
require APP_ROOT . '/App/helpers.php';

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

$view = new \App\View;

if (isset($_GET['id'])) {
    $view->article = News::findById($_GET['id']);
    $view->display('article');
} else {
    $view->news = News::getRecent();
    $view->display('news');
}

$user = new \App\Models\User();
$user->getEmail();


