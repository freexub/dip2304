<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\FormsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = $model->name;
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="forms-index">

    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title text-xl"><?= Html::encode($this->title) ?></h3>
        </div>
        <div class="card-body">
            <?= GridView::widget([
                'dataProvider' => $dataProvider,
//        'filterModel' => $searchModel,
                'showHeader' => false,
                'summary' => false,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],
                    [
                        'format' => 'raw',
                        'label' => 'Содержимое',
                        'options' => ['width' => '80%'],
                        'value' => function($data){
//                            var_dump((array)json_decode($data->content));die;
                            return $data->contentData;
                        }
                    ],
                    [
                        'format' => 'raw',
                        'label' => 'Сотрудник',
                        'options' => ['width' => '15%'],
                        'value' => function($data){
                            return $data->personal->getFullName();
                        }
                    ],
//                    [
//                        'format' => 'raw',
//                        'label' => 'Тип записи',
//                        'options' => ['width' => '15%'],
//                        'value' => function($data){
//                            return $data->forms->name;
//                        }
//                    ],
                ],
            ]); ?>
        </div>

    </div></div>
