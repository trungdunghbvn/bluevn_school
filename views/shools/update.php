<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Shools */

$this->title = 'Update Shools: ' . $model->school_id;
$this->params['breadcrumbs'][] = ['label' => 'Shools', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->school_id, 'url' => ['view', 'id' => $model->school_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="shools-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
