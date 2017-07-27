<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ShoolsSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="shools-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'school_id') ?>

    <?= $form->field($model, 'user_id') ?>

    <?= $form->field($model, 'school_name') ?>

    <?= $form->field($model, 'school_address') ?>

    <?= $form->field($model, 'school_phone') ?>

    <?php // echo $form->field($model, 'school_fax') ?>

    <?php // echo $form->field($model, 'school_email') ?>

    <?php // echo $form->field($model, 'school_status') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
