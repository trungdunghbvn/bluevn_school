<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\UserProfileBasic */

$this->title = $model->profile_basic_id;
$this->params['breadcrumbs'][] = ['label' => 'User Profile Basics', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-profile-basic-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->profile_basic_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->profile_basic_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'profile_basic_id',
            'user_id',
            'profile_basic_code',
            'profile_basic_gender',
            'profile_basic_email:email',
            'profile_basic_images',
            'profile_basic_birthday',
            'profile_basic_identity_card',
            'profile_basic_address',
            'profile_basic_birthplace',
            'profile_basic_phone',
            'profile_basic_ethnic',
        ],
    ]) ?>

</div>
