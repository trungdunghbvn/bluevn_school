<?php

use yii\helpers\Html;

use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\UserSearch */
/* @var $form yii\widgets\ActiveForm */
$user = \app\models\User::findOne(Yii::$app->user->id);
$role = $user->role;
?>

<div class="user-search">

    <?php $form = ActiveForm::begin([
        'action' => ['customer'],
        'method' => 'get',
        'layout' => 'horizontal',
        'fieldConfig' => [
        'template' => "{label}\n{beginWrapper}\n{input}\n{hint}\n{error}\n{endWrapper}",
        'horizontalCssClasses' => [
            'label' => 'col-md-1',
            'offset' => 'col-sm-offset-4',
            'wrapper' => 'col-md-3',
            'error' => '',
            'hint' => '',
             ],
        ],
    ]); ?>

    <?php echo $form->field($model, 'fullname') ?>
    
    <?php
    if($role==1){
    echo $form->field($model, 'role')->dropDownList($model->getRoleDropdown(),
            ['prompt'=>'All']);
    }
    ?>
    
    <?php // echo $form->field($model, 'username') ?>

    <?php // echo $form->field($model, 'auth_key') ?>

    <?php // echo $form->field($model, 'password_hash') ?>

    <?php // echo $form->field($model, 'password_reset_token') ?>

    <?php // echo $form->field($model, 'email') ?>

    <?php // echo $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
