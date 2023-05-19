<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use miloschuman\highcharts\Highcharts;
use yii\web\JsExpression;
use miloschuman\highcharts\SeriesDataHelper;

/* @var $this yii\web\View */
/* @var $searchModel app\models\TicketSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Ваши служебки';
?>

<?php
/**/
echo Highcharts::widget([
    'options' => [
        'title' => ['text' => 'Служебки по дням'],
        'xAxis' => [
            'categories' => $date,
            #'categories' => [1,2,3,4]
        ],
        'yAxis' => [
            'title' => ['text' => 'Количество служебок'],
            #'categories' => count($date)
        ],
        'series' => [
            #[$line],
            ['name' => 'Все служебки', 'data' => array_values($count)],
            ['name' => 'Заправка картриджа', 'data' => array_values($count_all[0])],
            ['name' => 'Локальная сеть / интернет', 'data' => array_values($count_all[1])],
            ['name' => 'Ремонт компьютера', 'data' => array_values($count_all[2])],
            #['name' => 'Заправка картриджа', 'data' => [1, 5, 3,5]]
        ]
    ]
]);



?>