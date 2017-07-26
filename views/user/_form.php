<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\User */
/* @var $form yii\widgets\ActiveForm */
$user = \app\models\User::findOne(Yii::$app->user->id);
$role = $user->role;
?>

<div class="user-form">

    <?php $form = ActiveForm::begin(); ?>
    
    <?= $form->field($model, 'username')->textInput() ?>
    <?php if(!isset($model->id)){ ?>
        <?= $form->field($model, 'password_hash')->textInput(['type'=>'password']) ?>
    <?php } ?>
    
    <?php 
    if($role==1){
        echo $form->field($model, 'role')->dropDownList($model->getRoleDropdown());
    }
    elseif ($role==2) {
        echo "<div class='hidden'>";
           $model->role = intval(3);
           echo $form->field($model, 'role')->textInput();
        echo '</div>';   
    }
    ?>
    
    <?= $form->field($model, 'fullname')->textInput() ?>
    
    <?= $form->field($model, 'email')->textInput() ?>
    
    <?= $form->field($model, 'status')->dropDownList($model->getStatusDropdown()); ?>
    
    <?= $form->field($model, 'images_url')->fileInput() ?>
    
    <?= $form->field($model, 'phone')->textInput() ?>
    
    <?= $form->field($model, 'address')->textarea() ?>
    

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
