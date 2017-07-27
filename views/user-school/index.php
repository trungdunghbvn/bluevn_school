<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\UserSchoolSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'User Schools';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-school-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create User School', ['/user/create-shool'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'user_school_id',
            'user_id',
            'school_id',
            'user_school_role',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
