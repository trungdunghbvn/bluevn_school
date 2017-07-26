<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ListSetup */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="list-setup-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'list_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'list_parent')->textInput() ?>

    <?= $form->field($model, 'list_value')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'list_description')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
