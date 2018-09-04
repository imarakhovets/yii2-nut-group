<?php

/* @var $this yii\web\View */

use yii\helpers\Html;


$this->title = $page->title;
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-about">
    <h1><?= Html::encode($page->h1) ?></h1>

    <p>
        <?= $page->text ?>
    </p>
</div>
