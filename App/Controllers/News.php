<?php

namespace App\Controllers;

use App\View;
use App\Models\News;

class NewsController
{
    protected $view;

    public function __construct()
    {
        $this->view = new View();
    }

    public function action($name)
    {
        $methodName = 'action' . $name;

        return $this->$methodName();
    }

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
