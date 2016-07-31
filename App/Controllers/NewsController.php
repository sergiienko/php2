<?php

namespace App\Controllers;

use App\Models\News;

class NewsController extends BaseController
{
    protected function actionIndex()
    {
        $this->view->news = News::findAll();
        $this->view->display('news');
    }

    protected function actionOne()
    {
        $id = (int) $_GET['id'];

        $this->view->article = News::findById($id);

        $this->view->display('article');
    }
}
