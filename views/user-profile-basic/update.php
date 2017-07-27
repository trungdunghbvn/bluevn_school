<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\UserProfileBasic */

$this->title = 'Update User Profile Basic: ' . $model->profile_basic_id;
$this->params['breadcrumbs'][] = ['label' => 'User Profile Basics', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->profile_basic_id, 'url' => ['view', 'id' => $model->profile_basic_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="user-profile-basic-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
