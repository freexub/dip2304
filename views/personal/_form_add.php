<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;

/* @var $this yii\web\View */
/* @var $model app\models\FormsFieldsData */
/* @var $formData yii\widgets\ActiveForm */
//var_dump($form->formsFields);die();
?>
<div class="card card-outline card-success mb-0">
    <div class="card-header">
        <h3 class="card-title text-lx"><?=$formData->name?></h3>
    </div>
    <div class="card-body">
        <?php $form = ActiveForm::begin(); ?>
            <?php foreach ($formData->formsFields as $field) { ?>
                <?= Html::label($field->name, 'Field['.$field->id.']', ['class' => 'label username']) ?>
                <?php
                    switch ($field->type){
                        case 'text':
                            echo Html::input('text', 'Field['.$field->id.']', '', ['class' => 'form-control']);
                            break;
                        case 'textarea':
                            echo Html::textArea('Field['.$field->id.']', '',['class' => 'form-control', 'rows'=>4]);
                            break;
                        case 'data':
                            echo DatePicker::widget([
                                'name' => 'Field['.$field->id.']',
                                'type' => DatePicker::TYPE_COMPONENT_PREPEND,
//                                'value' => '23-Feb-1982',
                                'pluginOptions' => [
                                    'autoclose' => true,
                                    'format' => 'dd-M-yyyy'
                                ]
                            ]);
                            break;
                    }
                ?>
            <?php } ?>
            <?= Html::hiddenInput('form_id', $formData->id) ?>
            <div class="form-group mt-3">
                <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
            </div>
        <?php ActiveForm::end(); ?>
    </div>
</div>
