<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\PersonalSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="personal-search">
    <div class="row">
        <div class="col-md-11">
            <?php $form = ActiveForm::begin([
                'action' => ['view','id'=>$_GET['id']],
                'method' => 'get',
            ]); ?>

            <?= $form->field($model, 'form_id')->dropDownList(ArrayHelper::map($model->getAllForms(),'id', 'name'),['prompt'=>'- Выбрать все записи -'])->label(false) ?>
        </div>
        <div class="col-md-1">
            <div class="form-group">
                <?= Html::submitButton('Поиск', ['class' => 'btn btn-info']) ?>
            </div>
        </div>

        <?php ActiveForm::end(); ?>
        <hr>
    </div>
</div>
