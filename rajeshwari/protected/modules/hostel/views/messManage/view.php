<?php
$this->breadcrumbs=array(
	'Mess Manages'=>array('/hostel'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List MessManage', 'url'=>array('index')),
	array('label'=>'Create MessManage', 'url'=>array('create')),
	array('label'=>'Update MessManage', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete MessManage', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage MessManage', 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('hostel','View MessManage');?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'student_id',
		'food_preference',
		'amount',
		'status',
		'created',
	),
)); ?>
