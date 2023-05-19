<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PersonalSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Сотрудники';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="personal-index">

    <div class="card card-info">
        <div class="card-header">
            <h3 class="card-title text-xl">
                <?= Html::encode($this->title) ?>
            </h3>
            <div class="card-tools">
                <?= Html::a('Добавление сотрудника', ['site/signup/'], ['class' => 'btn btn-success']) ?>
            </div>

        </div>
        <div class="card-body">
            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],

                    #'id',
                    #'user_id',
                    'firstname',
                    'lastname',
                    'patronymic',
                    //'active',

                    ['class' => 'yii\grid\ActionColumn'],
                ],
            ]); ?>
        </div>
    </div>



</div>
