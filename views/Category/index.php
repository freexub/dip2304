<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CategorySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Категории';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="category-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Добавить категорию', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'formatter' => ['class' => 'yii\i18n\Formatter','nullDisplay' => 'Главная категория'],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            #'id',
            'name',
            #'parent_id',
            [
                'label'=>'Кол-во шт',
                'attribute'=>'count',
            ],
            #'active',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
