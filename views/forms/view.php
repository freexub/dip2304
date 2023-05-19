<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Forms */
/* @var $modelField app\models\FormsFields */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Формы', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="forms-view">
    <div class="card card-info">
        <div class="card-header">
            <h3 class="card-title text-xl"><?= Html::encode($this->title) ?></h3>
            <div class="card-tools">
                <?= Html::a('<span class="fa fa-pen"></span>', ['update', 'id' => $model->id], ['class' => 'btn btn-primary float-fight ml-2']) ?>
                <?= Html::a('<span class="fa fa-trash"></span>', ['delete', 'id' => $model->id], [
                    'class' => 'btn btn-danger float-fight ml-2',
                    'data' => [
                        'confirm' => 'Are you sure you want to delete this item?',
                        'method' => 'post',
                    ],
                ]) ?>
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <?php foreach ($fieldList as $field){
                    echo '<div class="col-md-11 mb-3">'.Html::input('text', 'username', $field->name, ['class' => 'form-control'])
                        . '</div><div class="col-md-1"><a href="delete-field?id='.$field->id.'" class="btn btn-danger ml-3  mb-3"> <span class="fa fa-trash"></span></a></div>';
                }?>
            </div>
        </div>
        <div class="card-footer">
            <?= $this->render('_form_field', [
                'model' => $modelField,
                'fieldList' => $fieldList,
            ]) ?>
        </div>
    </div>
</div>
