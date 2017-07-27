<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\UserProfileBasicSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'User Profile Basics';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-profile-basic-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create User Profile Basic', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'profile_basic_id',
            'user_id',
            'profile_basic_code',
            'profile_basic_gender',
            'profile_basic_email:email',
            // 'profile_basic_images',
            // 'profile_basic_birthday',
            // 'profile_basic_identity_card',
            // 'profile_basic_address',
            // 'profile_basic_birthplace',
            // 'profile_basic_phone',
            // 'profile_basic_ethnic',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
