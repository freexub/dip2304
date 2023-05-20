<?php

/* @var $this yii\web\View */
use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;
$this->title = 'Склад';
#return $this->redirect(['account/index']);
#header('Location: account/index');
?>

<div class="site-index">
    <div class="jumbotron">

        <div class="card">
            <div class="card-header">
                <h3 class="card-title text-xl text-center">Разработка приложения учета персонала.</h3>
            </div>

            <div class="card-body">

                <div id="accordion">
                    <div class="card card-info">
                        <div class="card-header">
                            <h4 class="card-title w-100">
                                <a class="d-block w-100" data-toggle="collapse" href="#collapseOne">
                                    Что умеет приложение?
                                </a>
                            </h4>
                        </div>
                        <div id="collapseOne" class="collapse show" data-parent="#accordion">
                            <div class="card-body">
                                Приложение позволяет вести учет сотрудников, с возможностью формирования босконечного количества типов записей.
                            </div>
                        </div>
                    </div>
                    <div class="card card-olive ">
                        <div class="card-header">
                            <h4 class="card-title w-100">
                                <a class="d-block w-100" data-toggle="collapse" href="#collapseTwo">
                                    Есть ли ограничение по количеству данных?
                                </a>
                            </h4>
                        </div>
                        <div id="collapseTwo" class="collapse" data-parent="#accordion">
                            <div class="card-body">
                                Нет, ограничением может стать лишь отсутствие идеи для создания нового вида записей.
                            </div>
                        </div>
                    </div>
                    <div class="card card-olive">
                        <div class="card-header">
                            <h4 class="card-title w-100">
                                <a class="d-block w-100" data-toggle="collapse" href="#collapseThree">
                                    Какие технологие используются?
                                </a>
                            </h4>
                        </div>
                        <div id="collapseThree" class="collapse" data-parent="#accordion">
                            <div class="card-body">
                                php, mysql, yii2.
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
</div>
