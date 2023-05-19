<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \mdm\admin\models\form\Signup */

$this->title = 'Регистрация';
$this->params['breadcrumbs'][] = ['label' => 'Сотрудник', 'url' => ['personal/index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-signup">
    <h1>Регистрация нового сотрудника</h1>

    <p>Заполните поля</p>
    <?= Html::errorSummary($model)?>
    <?= Html::errorSummary($personal)?>
    <div class="row">
	<?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>
        <div class="col-lg-5">
            <?= $form->field($model, 'username')->textInput(['placeholder'=>'Придумайте Ваш логин'])->label('Логин') ?>
            <?= $form->field($model, 'email')->textInput(['placeholder'=>'Укажите Ваш e-mail']) ?>
            <?= $form->field($model, 'password')->passwordInput(['placeholder'=>'Придумайте Ваш пароль'])->label('Введите пароль') ?>
            <?= $form->field($model, 'retypePassword')->passwordInput(['placeholder'=>'Подтвердите Ваш пароль'])->label(false) ?>
        </div>
		<div class="col-lg-5">
            <?= $form->field($personal, 'firstname')->textInput(['placeholder'=>'Укажите Вашу Фамилию']) ?>
            <?= $form->field($personal, 'lastname')->textInput(['placeholder'=>'Укажите Ваше имя']) ?>
            <?= $form->field($personal, 'patronymic')->textInput(['placeholder'=>'Укажите Ваше Отчество']) ?>

			 <div class="form-group">
                <?= Html::submitButton('Регистрация', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
            </div>
		</div>
		<?php ActiveForm::end(); ?>
    </div>
</div>
