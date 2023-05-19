<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Ticket */

$this->title = $model->type->name;
$this->params['breadcrumbs'][] = ['label' => 'Tickets', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ticket-view">

    <h2><?= Html::encode($this->title) ?></h2>
    <h4><?= Html::encode('номер служебки: '.$model->id) ?></h4>

    <p>
        <?#= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?/*= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) */?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            [
                'attribute'=>'type.name',
                'label'=>'Вид работ',
            ],
            [
                'attribute'=>'levels.name',
                'label'=>'Подразделение',
            ],
            [
                'attribute'=>'status0.name',
                'label'=>'Статус',
            ],
            [
                'attribute'=>'ticketInf.date',
                'label'=>'Дата создания',
            ],
            [
                'attribute'=>'ticketInf.inv_number',
                'label'=>'Инвентарный номер',
            ],
            [
                'attribute'=>'ticketInf.corp.name',
                'label'=>'Корпус',
            ],
            [
                'attribute'=>'ticketInf.auditory',
                'label'=>'Аудитория',
            ],
            [
                'label'=>'Скан служебной записки',
                'attribute'=>'ticketInf.scan',
                'format'=>'raw',
                'value'=> Html::a('Просмотр скана служебки', ['/uploads/scan/'.$model->ticketInf->scan],['target' => '_blank']),

            ],
        ],
    ]) ?>

</div>
