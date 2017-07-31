<?php
use yii\helpers\Html;
use yii\grid\GridView;
?>

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