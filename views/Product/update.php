<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Product */

$this->title = 'Редактирование: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Предмет', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="product-update">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php
        if(empty($model->img)){
            $img = 'no_photo.gif';
        }else{
            $img = $model->img;
        }
        echo '<img src="/web/uploads/img/'.$img.'" style="width:200px">';
    ?>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
