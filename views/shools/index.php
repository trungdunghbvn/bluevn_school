<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ShoolsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Shools';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="shools-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Add Shools', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
//        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'school_id',
//            'user_id',
            
            [
              'attribute'=>'school_name',
               'format'=>'raw',
               'value'=>function($model){
                return \yii\bootstrap\Html::a($model->school_name, ['view','id'=>$model->school_id]);}
            ],
            'school_address',
            'school_phone',
            // 'school_fax',
            // 'school_email:email',
             'school_status',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
