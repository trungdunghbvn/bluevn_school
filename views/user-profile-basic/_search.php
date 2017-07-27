<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\UserProfileBasicSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-profile-basic-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'profile_basic_id') ?>

    <?= $form->field($model, 'user_id') ?>

    <?= $form->field($model, 'profile_basic_code') ?>

    <?= $form->field($model, 'profile_basic_gender') ?>

    <?= $form->field($model, 'profile_basic_email') ?>

    <?php // echo $form->field($model, 'profile_basic_images') ?>

    <?php // echo $form->field($model, 'profile_basic_birthday') ?>

    <?php // echo $form->field($model, 'profile_basic_identity_card') ?>

    <?php // echo $form->field($model, 'profile_basic_address') ?>

    <?php // echo $form->field($model, 'profile_basic_birthplace') ?>

    <?php // echo $form->field($model, 'profile_basic_phone') ?>

    <?php // echo $form->field($model, 'profile_basic_ethnic') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
