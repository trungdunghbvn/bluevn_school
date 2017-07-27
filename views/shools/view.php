<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Shools */

$this->title = $model->school_id;
$this->params['breadcrumbs'][] = ['label' => 'Shools', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="shools-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->school_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->school_id], [
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
            'school_id',
            'user_id',
            'school_name',
            'school_address',
            'school_phone',
            'school_fax',
            'school_email:email',
            'school_status',
        ],
    ]) ?>

</div>
