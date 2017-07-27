<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Shools */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="shools-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'school_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'school_address')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'school_phone')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'school_fax')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'school_email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'school_status')->dropDownList($model->getStatusDropdown()); ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
