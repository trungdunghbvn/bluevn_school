<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Danh sách khách hàng');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index">

    <?php  echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create User'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
//        'filterModel' => false,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

//            'id',
            'fullname',
//            'username',
//            'auth_key',
//            'password_hash',
//            'password_reset_token',
//             'email:email',
            [
                'attribute'=>'role',
                'content'=>function($model){
                if($model->role <=3){
                    return $model->getRole();
                    }
                    return $model->getRoleShool();
                }
            ],
            [
                'header'=>'Số trường đăng ký',
                'value'=>function($model){
                    return $model->getStatus();
                }
            ],   
            [
                'header'=>'Số học sinh',
                'value'=>function($model){
                    return $model->getStatus();
                }
            ],     
            [
                'header'=>'Số thuê bao',
                'value'=>function($model){
                    return $model->getStatus();
                }
            ],   
            [
                'attribute'=>'status',
                'value'=>function($model){
                    return $model->getStatus();
                }
            ],        
            // 'created_at',
            // 'updated_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
