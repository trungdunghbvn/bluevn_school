<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\bootstrap\Tabs;
use yii\bootstrap\Modal;

/* @var $this yii\web\View */
/* @var $model app\models\Shools */

$this->title = $model->school_id;
$this->params['breadcrumbs'][] = ['label' => 'Shools', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="shools-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Back', ['index'], ['class' => 'btn btn-primary']) ?>
        
        <?php Modal::begin([
            'header' => '<h2>Thêm tài khoản cho trường</h2>',
            'toggleButton' => ['label' => 'Add admin shool',
                               'class' => 'btn btn-primary',
                               'onclick'=>'addadmin('.$model->school_id.')'],
            ]);

            echo "<div id='add_admin'>aa</div>";

            Modal::end(); 
        ?>
        
        <?php // echo Html::a('Add admin shool', ['user/create-shool'], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->school_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'school_id',
            'user_id',
            'school_name',
            'school_address',
            'school_phone',
            'school_fax',
            'school_email:email',
            'school_status',
        ],
    ]); 
            echo Tabs::widget([
                'items' => [
                    [
                        'label' => 'Danh sách admin',
                        'content' =>"<div id='user_school'></div>",
                        'active' => true,
                        'options' => ['id' => 'b'],
                    ],
//                    [
//                        'label' => 'Liên hệ',
//                        'content' =>$this->render('_view_lienhe', ['model' => $model]),
//                        'headerOptions' => [''],
//                        'options' => ['id' => 'a'],
//                    ],
//                    [
//                        'label' => 'Hóa đơn',
//                        'content' => '',
//                        'headerOptions' => [''],
//                        'options' => ['id' => 'myveryownIsdfsdfD'],
//                    ]

                ]
                    ]);?>

</div>
<script>
         window.onload = function()
            {
                var id = <?php echo $model->school_id;?>;
            	 $('#user_school').load('<?php echo Yii::$app->homeUrl.'user/user-school' ?>',{school_id:id});
            };
            
function addadmin(school_id){
    $('#add_admin').load('<?php echo Yii::$app->homeUrl.'user/create-shool' ?>',{school_id:school_id});
    $('h4').html('<h1>Thêm địa chỉ</h1>');
}
</script>