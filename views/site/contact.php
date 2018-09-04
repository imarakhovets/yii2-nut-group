<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\ContactForm */

use yii\helpers\Html;

//$page->phone = "+7 (922) 805 94 89";
//$page->address = "Московская область, Кролев, Пианерская 1/4";
$this->title = $page->title;
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="site-contact">
    <h1><?= Html::encode($page->h1) ?></h1>


        <p>
            <?= $page->description ?>
        </p>
        <p>
            Телефон: <?= $page->phone ?>
        </p>
        <p>
            Адрес: <?= $page->address ?>
        </p>
        <div class="row">
            <div class="col-lg-5">



            </div>
        </div>

 
</div>
