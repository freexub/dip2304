<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\models\Personal */
/* @var $modelData app\models\FormsFieldsData */

$this->title = $model->firstname.' '.$model->lastname.' '.$model->patronymic;
$this->params['breadcrumbs'][] = ['label' => 'Сотрудник', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>

<?php foreach ($model->getAllForms() as $form) { ?>
    <div class="modal" tabindex="-1" role="dialog" id="modalAdd<?=$form->id?>">
        <div class="modal-dialog" role="document">
        <div class="modal-content" >
            <?= $this->render('_form_add', [
                'model' => $modelData,
                'formData' => $form,
            ]) ?>
        </div>
        </div>
    </div>
<?php } ?>

<div class="personal-view">
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title text-xl"><?= Html::encode($this->title) ?></h3>
            <div class="card-tools">
                <?= Html::a('<span class="fa fa-pen"></span>', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
                <?= Html::a('<span class="fa fa-trash"></span>', ['delete', 'id' => $model->id], [
                    'class' => 'btn btn-danger',
                    'data' => [
                        'confirm' => 'Вы точно хотите удалить пользователя?',
                        'method' => 'post',
                    ],
                ]) ?>
            </div>

        </div>
        <div class="card-body">
            <?= DetailView::widget([
                'model' => $model,
                'attributes' => [
                    'firstname',
                    'lastname',
                    'patronymic',
                    [
                        'label'=>'E-mail',
                        'attribute'=>'user.email',
                    ],
                    [
                        'label'=>'Логин',
                        'attribute'=>'user.username',
                    ],
                ],
            ]) ?>
        </div>
        <div class="card-footer">
            <span class="text-xl">История</span>
            <div class="btn-group float-right">
                <button type="button" class="btn btn-primary" data-toggle="dropdown">Добавить запись</button>
                <div class="dropdown-menu" role="menu">
                    <?php foreach ($model->getAllForms() as $form) { ?>
                        <a href="#" class="dropdown-item" data-toggle="modal" data-target="#modalAdd<?=$form->id?>"><?=$form->name?></a>
                    <?php } ?>
                </div>
            </div>
            <?= GridView::widget([
                'dataProvider' => $dataProvider,
//                'filterModel' => $searchModel,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],
                    [
                        'format' => 'raw',
                        'label' => 'Содержимое',
                        'options' => ['width' => '80%'],
                        'value' => function($data){
//                            var_dump((array)json_decode($data->content));die;
                            return $data->contentData;
                        }
                    ],
                    [
                        'format' => 'raw',
                        'label' => 'Тип записи',
                        'options' => ['width' => '15%'],
                        'value' => function($data){
                            return $data->forms->name;
                        }
                    ],
                    [
                        'format' => 'raw',
//                        'label' => 'Действие',
                        'options' => ['width' => '5%'],
                        'value' => function($data){
                            return Html::a('<span class="fa fa-trash"></span>', ['delete-history', 'id' => $data->id], ['class' => 'btn btn-danger ']);
                        }
                    ],
//                    'forms.name',
//                    [
//                        'label' => 'Изображение',
//                        'options' => ['width' => '50'],
//                        'format' => 'raw',
//                        'value' => function ($data) {
//                            //  var_dump($model); var_dump($key); exit;
//                            if(empty($data->product->img)){
//                                $img = '/web/uploads/img/no_photo.gif';
//                            }else{
//                                $img = '/web/uploads/img/'.$data->product->img;
//                            }
//                            return '<img src="'.$img.'" width="50px">';
//                        },
//                    ],
//                    [
//                        'label' => false,
//                        'options' => ['width' => '50'],
//                        'format' => 'raw',
//                        'value' => function ($data) {
//                            return Html::a('Вернуть на склад', ['product/return?id='.$data->product->id.'&pid='.$_GET['id']], ['class' => 'btn btn-success']);
//                        },
//                    ],
                ],
            ]); ?>
        </div>
    </div>



</div>
