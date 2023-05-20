<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \mdm\admin\models\form\Signup */

$this->title = 'Добавление сотрудника';
$this->params['breadcrumbs'][] = ['label' => 'Сотрудники', 'url' => ['personal/index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-signup">

    <div class="card card-outline card-success">
        <div class="card-header">
            <h3 class="card-title">Регистрация нового сотрудника</h3>
        </div>
        <div class="card-body">
            <?= Html::errorSummary($model)?>
            <?= Html::errorSummary($personal)?>
            <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>
                <div class="row">
                    <div class="col col-md-6">
                        <?= $form->field($model, 'username')->textInput(['placeholder'=>'Придумайте Ваш логин'])->label('Логин') ?>
                        <?= $form->field($model, 'email')->textInput(['placeholder'=>'Укажите Ваш e-mail']) ?>
                        <?= $form->field($model, 'password')->passwordInput(['placeholder'=>'Придумайте Ваш пароль'])->label('Введите пароль') ?>
                        <?= $form->field($model, 'retypePassword')->passwordInput(['placeholder'=>'Подтвердите Ваш пароль'])->label(false) ?>
                    </div>
                    <div class="col col-6">
                        <?= $form->field($personal, 'firstname')->textInput(['placeholder'=>'Укажите Вашу Фамилию']) ?>
                        <?= $form->field($personal, 'lastname')->textInput(['placeholder'=>'Укажите Ваше имя']) ?>
                        <?= $form->field($personal, 'patronymic')->textInput(['placeholder'=>'Укажите Ваше Отчество']) ?>
                        <?= Html::submitButton('Регистрация', ['class' => 'btn btn-primary']) ?>
                    </div>
                </div>
            <?php ActiveForm::end(); ?>
        </div>

    </div>

</div>
