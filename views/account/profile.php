<?php
use yii\helpers\Html;
use yii\widgets\DetailView;
/**
 * Created by PhpStorm.
 * User: kenguru
 * Date: 12.08.2018
 * Time: 19:45
 */

$this->title = 'Профиль';
?>
<div class="site-signup">
    <h3><?#= Html::encode($this->title) ?></h3>

<div class="row">
    <div class="col-lg-6">
	
        <?= DetailView::widget([
            'model' => $personal,
            'attributes' => [
                'firstname',
                'lastname',
                'patronymic',
                'levels.name',
                'position.name',
            ],
        ]) ?>
	
        <?#= Html::a('Update', ['update', 'id' => $personal->id], ['class' => 'btn btn-primary']) ?>
    </div>
</div>
</div>