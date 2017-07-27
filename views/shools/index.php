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
        <?= Html::a('Add admin Shools', ['user/create-shool'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
//        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'school_id',
//            'user_id',
            'school_name',
            'school_address',
            'school_phone',
            // 'school_fax',
            // 'school_email:email',
             'school_status',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
