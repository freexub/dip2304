<?php

use yii\helpers\Html;

$rout = Yii::$app->controller->id;
//var_dump($rout);die();
?>
<!-- Navbar -->
<nav class="main-header navbar navbar-expand-md navbar-dark navbar-dark">
    <div class="container">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item d-none d-sm-inline-block">
                <a href="<?=\yii\helpers\Url::home()?>" class="nav-link <?=($rout=='site')? 'active': ''?>">Главная</a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <a href="/personal/index" class="nav-link <?=($rout=='personal')? 'active': ''?>">Сотрудники</a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <a href="/forms/index" class="nav-link <?=($rout=='forms')? 'active': ''?>">Формы</a>
            </li>
        </ul>

        <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <?= Html::a('<i class="fas fa-sign-out-alt"></i>', ['/site/logout'], ['data-method' => 'post', 'class' => 'nav-link']) ?>
            </li>
        </ul>
    </div>
</nav>
<!-- /.navbar -->