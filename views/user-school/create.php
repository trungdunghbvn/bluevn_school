<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\UserSchool */

$this->title = 'Create User School';
$this->params['breadcrumbs'][] = ['label' => 'User Schools', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-school-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
