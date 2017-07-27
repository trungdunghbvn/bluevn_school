<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\UserProfileBasic */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-profile-basic-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'user_id')->textInput() ?>

    <?= $form->field($model, 'profile_basic_code')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'profile_basic_gender')->textInput() ?>

    <?= $form->field($model, 'profile_basic_email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'profile_basic_images')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'profile_basic_birthday')->textInput() ?>

    <?= $form->field($model, 'profile_basic_identity_card')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'profile_basic_address')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'profile_basic_birthplace')->textInput() ?>

    <?= $form->field($model, 'profile_basic_phone')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'profile_basic_ethnic')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
