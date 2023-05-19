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
                'name'  => 'product_id',
                'type'  => 'dropDownList',
                'title' => 'Special Products',
                'defaultValue' => 1,
                'items' => [
                    'text' => 'Техтовое поле',
                    'date' => 'Поле дата',
                ],
            ],
            [
                'name'  => 'count',
                'title' => 'Count',
                'defaultValue' => 1,
                'enableError' => true,
                'options' => [
//                    'type' => 'number',
                    'class' => 'input-priority',
                ]
            ]
        ],
//        'rowOptions' => function($model) {
//            $options = [];
//            if ($model['priority'] > 1) {
//                $options['class'] = 'danger';
//            }
//            return $options;
//        },
    ])
        ->label(false);
    ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
