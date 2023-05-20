<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\FormsSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="forms-search">

    <?php $form = ActiveForm::begin([
        'action' => ['history'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'form_id')->dropDownList(\yii\helpers\ArrayHelper::map($model->getAllForms(),'id','name'),['prompt'=>'Выбрать тип ']) ?>

    <div class="form-group">
        <?= Html::submitButton('Поиск', ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
