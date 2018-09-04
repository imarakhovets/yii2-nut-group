<?php

/* @var $this yii\web\View */

use yii\helpers\Html;


$this->title = $page->title;
?>
<div class="site-index">
    <h1><?= Html::encode($this->title) ?></h1>
        <p>
            <?= $page->text ?>
        </p>
</div>
