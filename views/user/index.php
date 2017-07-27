<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Users');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create User'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
//        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

//            'id',
            'fullname',
            'username',
//            'auth_key',
//            'password_hash',
//            'password_reset_token',
             'email:email',
            [
                'attribute'=>'status',
                'value'=>function($model){
                    return $model->getStatus();
                }
            ],
            [
                'attribute'=>'role',
                'value'=>function($model){
                    if($model->role <=3){
                    return $model->getRole();
                    }
                    elseif($model->role >3) {
                    return $model->getRoleShool();
                    }    
                }
            ],       
            // 'created_at',
            // 'updated_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
