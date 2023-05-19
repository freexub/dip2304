<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Product */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Предметы', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="product-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Редактировать', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Вы точно хотите удалить?',
                'method' => 'post',
            ],
        ]) ?>
    </p>
    <?php
        if(empty($model->img)){
            $img = 'no_photo.gif';
        }else{
            $img = $model->img;
        }
        echo '<img src="/web/uploads/img/'.$img.'" style="width:200px">';
    ?>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            #'id',
            'name',
            'number',
            'category.name',
            'price',
            'period',
            'count',
            #'active',
        ],
    ]) ?>

</div>
