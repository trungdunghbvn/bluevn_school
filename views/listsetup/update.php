<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ListSetup */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'List Setup',
]) . $model->list_id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'List Setups'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->list_id, 'url' => ['view', 'id' => $model->list_id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="list-setup-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
