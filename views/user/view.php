<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\User */

$this->title = $model->username;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Users'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-view">
    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Reset Password'), ['reset-password-user', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            [
                'attribute'=>'images',
                'format'=>'raw',
                'value'=>$model->getImages()
            ],
            'fullname',
            'username',
            [
                'attribute'=>'role',
                'format'=>'raw',
                'value'=>function($model){
                    if($model->role <=3){
                    return $model->getRole();
                    }
                    elseif($model->role >3) {
                    return $model->getRoleShool();
                    }    
                }
            ],
            'email:email',
            'auth_key',
            [
                'attribute'=>'status',
                'format'=>'raw',
                'value'=>$model->getStatus()
            ],
            'created_at:datetime',
        ],
    ]) ?>

</div>
