<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\Page;

class SiteController extends Controller
{
    public  $pages;

    public function init()
    {
        parent::init(); // TODO: Change the autogenerated stub
        $this->pages = Page::find()->all();
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex($alias = 'index')
    {
        if ($page = Page::findOne(['alias' => $alias])) {

            \Yii::$app->view->registerMetaTag(['name' => 'description', 'content' => $page->description]);
            \Yii::$app->view->registerMetaTag(['name' => 'keywords', 'content' => $page->keywords]);

            return $this->render($page->template, ['page' => $page]);
        }
        else
            return $this->render('error' , ['name' => "Ошибка", 'message' => 'Такой страницы не существует']);
    }
}