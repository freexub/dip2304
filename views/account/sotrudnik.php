<?php

use yii\helpers\Html;

use yii\grid\GridView;

use yii\helpers\ArrayHelper;
use mdm\admin\components\Helper;

/* @var $this yii\web\View */
/* @var $searchModel app\models\TicketSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Ваши служебки';
?>

<div class="ticket-index">
    <h3><?= Html::encode($this->title) ?></h3>

    <?php


        echo GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                [
                    'attribute'=>'id',
                    'label'=>'Вид работ',
                    'value' => 'id',
                ],
                [
                    'attribute'=>'type.name',
                    'label'=>'Вид работ',
                    'filter'=>Html::activeDropDownList($searchModel, 'type_id', ArrayHelper::map($count_t, 'id', 'name'),['class'=>'form-control','prompt' => 'Выбрать вид работ']),
                ],
                [
                    'attribute' => 'status0.name',
                    'label' => 'Моя категория',
                    'filter'=>Html::activeDropDownList($searchModel, 'status', ArrayHelper::map($status, 'id', 'name'),['class'=>'form-control','prompt' => 'Выбрать вид работ']),
                    #'value' => 'ticket.status',
                ],
                [
                    'attribute' => 'ticketInf.date',
                    'label' => 'Дата служебки',
                    'value' => 'ticketInf.date',
                ],

                [
				 'class' => 'yii\grid\ActionColumn',
                 'template' => Helper::filterActionColumn(['view']),
				],
            ],
        ]);

    ?>
    <!--=====================-->

    </div>
