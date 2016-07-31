<?php

namespace App\Controllers;

class News extends Base
{
    protected function actionIndex()
    {
        $this->view->news = \App\Models\News::findAll();
        $this->view->display('news');
    }

    protected function actionOne()
    {
        $id = (int) $_GET['id'];

        $this->view->article = \App\Models\News::findById($id);

        $this->view->display('article');
    }
}
