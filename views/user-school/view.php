<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\UserSchool */

$this->title = $model->user_school_id;
$this->params['breadcrumbs'][] = ['label' => 'User Schools', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-school-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->user_school_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->user_school_id], [
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
            'user_school_id',
            'user_id',
            'school_id',
            'user_school_role',
        ],
    ]) ?>

</div>
