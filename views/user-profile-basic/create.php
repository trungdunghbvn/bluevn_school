<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\UserProfileBasic */

$this->title = 'Create User Profile Basic';
$this->params['breadcrumbs'][] = ['label' => 'User Profile Basics', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-profile-basic-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
