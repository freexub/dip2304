<?php
use yii\helpers\Html;
use yii\bootstrap\Tabs;

use yii\helpers\Url;


use kartik\tabs\TabsX;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \mdm\admin\models\form\ChangePassword */

$this->title = 'Личный кабинет';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-signup">
    <h1><?= Html::encode($this->title) ?></h1>

    <?

    $arr =[
        'model' => $model,
        'personal' => $personal,
        'searchModel' => $searchModel,
        'dataProvider' => $dataProvider,
        'status' => $status,
        'date' => $date,
        'count' => $count,
        'count_t' => $count_t,
        'count_all' => $count_all,
        'all' => $all,
        'arrProfile'=>[]
    ];

    if (Yii::$app->user->can('admin')) {
        #var_dump($count);die();
    }
    #echo $di;
        echo TabsX::widget([
            'position'=>TabsX::POS_LEFT,
            'encodeLabels'=>false,
            'enableStickyTabs'=>true,
            'items' => [
                /**/[
                    'label' => 'Графики',
                    'content' => $this->render('charts', $arr),
                    'visible' => Yii::$app->user->can('admin'),
                    #'active' => true
                ],

                [
                    'label' => 'Служебки',
                    'content' => $this->render('sotrudnik', $arr),
                    'visible' => Yii::$app->user->can('ticket'),
                    #'active' => true
                ],
                [
                    'label' => 'Профиль',
                    'content' => $this->render('profile', $arr ),
                    'visible' => Yii::$app->user->identity,
                    'headerOptions' => ['style'=>'font-weight:bold'],
                    'options' => ['id' => 'myveryownID'],
                ],
                [
                    'label' => 'Смена пароля',
                    'content' => $this->render('change-password', $arr ),
                    'visible' => Yii::$app->user->can('test'),
                    'headerOptions' => ['style'=>'font-weight:bold'],
                ],
                /*
                [
                    'label' => 'Dropdown',
                    'items' => [
                        [
                            'label' => 'DropdownA',
                            'content' => 'DropdownA, Anim pariatur cliche...',
                        ],
                        [
                            'label' => 'DropdownB',
                            'content' => 'DropdownB, Anim pariatur cliche...',
                        ],
                    ],
                ],
                */
            ],
        ]);
/*    if (Yii::$app->user->can('test')) {
    }else{


        echo Tabs::widget([
            #'position'=>Tabs::POS_LEFT,
            'encodeLabels' => false,
            'items' => [

                [
                    'label' => 'Новости',
                    'content' => 'Hello!',
                    #'visible' => Yii::$app->user->can('ticket'),
                ],
                [
                    'label' => 'Служебки',
                    'content' => $this->render('sotrudnik', $arr),
                    #'visible' => Yii::$app->user->can('ticket'),
                ],
                [
                    'label' => 'Профиль',
                    'content' => $this->render('profile', $arr ),
                    'visible' => Yii::$app->user->identity,

                ],

                [
                    'label' => 'Смена пароля',
                    'content' => $this->render('change-password', $arr ),
                    #'visible' => Yii::$app->user->can('test'),
                ],
            ]

        ]);

    }*/
    ?>
</div>
