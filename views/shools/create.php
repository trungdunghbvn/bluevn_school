<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Shools */

$this->title = 'Create Shools';
$this->params['breadcrumbs'][] = ['label' => 'Shools', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="shools-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
