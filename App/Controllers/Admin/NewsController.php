<?php

namespace App\Controllers\Admin;

use App\Models\News;
use App\Controllers\BaseController;

class NewsController extends BaseController
{
    protected function actionIndex()
    {
        $this->view->news = News::findAll();
        $this->view->display('admin.news');
    }

    protected function actionEdit()
    {
    	if (isset($_POST['article'])) {
		    $article = new News();
	        $article->id = $_POST['article']['id'];
	        $article->title = $_POST['article']['title'];
            $article->text = $_POST['article']['text'];
            $article->save();
    	}

        $id = (int) $_GET['id'];

        $this->view->article = News::findById($id);

        $this->view->display('admin.article');
    }

    protected function actionAdd()
    {
    	if (isset($_POST['article'])) {
		    $article = new News();
	    	$article->title = $_POST['article']['title'];
            $article->text = $_POST['article']['text'];
            $article->save();

            header('Location: /admin/news/edit?id=' . $article->id);
            die;
        }

        $this->view->display('admin.add.article');
    }

    protected function actionDelete()
    {
    	if (isset($_POST['article'])) {
		    $article = new News();
	        $article->id = $_POST['article']['id'];
            $article->delete();

            header('Location: /admin/news');
            die;
    	}
    }
}