<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\UserSchool */

$this->title = 'Update User School: ' . $model->user_school_id;
$this->params['breadcrumbs'][] = ['label' => 'User Schools', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->user_school_id, 'url' => ['view', 'id' => $model->user_school_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="user-school-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
