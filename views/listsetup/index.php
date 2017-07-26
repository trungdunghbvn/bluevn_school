<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\ListsetupSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'List Setups');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="list-setup-index">

<!--    <h1><?= Html::encode($this->title) ?></h1>-->
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

<!--    <p>
        <?= Html::a(Yii::t('app', 'Create List Setup'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>-->
<?php Pjax::begin(); ?>    
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'id'=>'list-setup-gridview',
        'filterModel' => $searchModel,
        'showFooter' => true,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'attribute'=>'list_name',
                'format'=>'raw',
                'value'=>function($data){
                    return '<a href="'.Yii::$app->urlManager->createUrl('listsetup/item?parent_id='.$data->list_id).'">'.Yii::t('app',$data->list_name).'</a>';
                },
                'footer' =>'<input type="text" value="" name="ListSetup[list_name]" id="list_name" class="form-control" />'
                        . '<input type="hidden" value="0" name="ListSetup[list_parent]" id="list_parent" class="form-control" />'
                        . '<input type="hidden" value="parent" name="ListSetup[list_value]" id="list_value" class="form-control" />',
            ],
            [
                'attribute'=>'list_description',
                'footer' =>'<textarea name="ListSetup[list_description]" id="list_description" class="form-control" rows="1"></textarea>',
                'filter'=>false
            ],
            [
                'class' => 'yii\grid\ActionColumn',
                'footer' =>'<button class="btn btn-primary" onclick="add_listsetup();">'.Yii::t('app', 'Add').'</button>',
            ],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
    <script type="text/javascript">
        function add_listsetup(){
            var list_name = $('#list_name').val();
            var list_value = $('#list_value').val();
            var list_description = $('#list_description').val();
            var list_parent = $('#list_parent').val();
            $.ajax({
                type:'post',
                url:'<?php echo Yii::$app->urlManager->createUrl('listsetup/create'); ?>',
                data:{'ListSetup[list_value]':list_value,'ListSetup[list_parent]':list_parent,'ListSetup[list_description]':list_description,
                        'ListSetup[list_name]':list_name},
                success:function(data){
                    $("#list-setup-gridview").yiiGridView("applyFilter");
                }
                
            });
        }
    </script>