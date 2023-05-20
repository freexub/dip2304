<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use unclead\multipleinput\MultipleInput;
use unclead\multipleinput\renderers\ListRenderer;

/* @var $this yii\web\View */
/* @var $model app\models\Forms */
/* @var $fieldList app\models\FormsFields */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="forms-form">
    <?php $form = ActiveForm::begin(); ?>
    <?php
    echo $form->field($model, 'name')->widget(MultipleInput::className(), [
        'max' => 4,
        'addButtonOptions' => [
            'label' => '<span class="fa fa-plus"></span>' // also you can use html code
        ],
        'removeButtonOptions' => [
            'label' => '<span class="fa fa-trash"></span>'
        ],
        'allowEmptyList' => true,
        'enableGuessTitle' => true,
        'columns' => [
            [
                'name'  => 'type',
                'type'  => 'dropDownList',
                'title' => 'Тип поля',
                'defaultValue' => 'text',
//                'enableError' => true,
                'items' => [
                    'text' => 'Текстовое поле',
                    'data' => 'Поле дата',
                    'textarea' => 'Поле несколько строк',
                ],
            ],
            [
                'name'  => 'name',
                'title' => 'Название',
//                'defaultValue' => 1,
                'enableError' => true,
                'options' => [
//                    'type' => 'number',
//                    'placeholder' => 'number',
                    'class' => 'input-priority',
                ]
            ]
        ],
    ])
        ->label(false);
    ?>

    <?= $form->field($model,'form_id')->hiddenInput(['value'=>$form_id])->label(false)?>
    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
