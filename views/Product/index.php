<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ProductSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Склад';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?php if(Yii::$app->user->can('admin')){ ?>
            <?= Html::a('Добавить предмет', ['create'], ['class' => 'btn btn-success']) ?>
            <?= Html::a('Категории', ['/category/index'], ['class' => 'btn btn-info']) ?>
            <?= Html::a('Отчёт', ['itog'], ['class' => 'btn btn-warning pull-right', 'target'=> '_blank']) ?>
        <?php }?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            #'id',
            [
                'label' => 'Изображение',
                'options' => ['width' => '50'],
                'format' => 'raw',
                'value' => function ($data) {
                    //  var_dump($model); var_dump($key); exit;
                    if(empty($data->img)){
                        $img = '/web/uploads/img/no_photo.gif';
                    }else{
                        $img = '/web/uploads/img/'.$data->img;
                    }
                    return '<img src="'.$img.'" width="50px">';
                },
            ],
            'number',
            'name',
            'price',
            'period',
            'count',
            [
                'label' => false,
                'options' => ['width' => '50'],
                'format' => 'raw',
                'value' => function ($data) {
                    //  var_dump($model); var_dump($key); exit;
                    if($data->count > 0){
                        return Html::a('Взять со склада', ['take?id='.$data->id], ['class' => 'btn btn-success']);
                    }else{
                        return Html::a('Нет на складе', ['take?id='.$data->id], ['class' => 'btn btn-default disabled']);
                    }
                },
            ],
            //'active',

            ['class' => 'yii\grid\ActionColumn', 'visible' => Yii::$app->user->can('admin')],
        ],
    ]); ?>
</div>
