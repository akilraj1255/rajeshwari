<?php
$this->breadcrumbs=array(
	'Mess Fees'=>array('/hostel'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List MessFee', 'url'=>array('index')),
	array('label'=>'Create MessFee', 'url'=>array('create')),
	array('label'=>'Update MessFee', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete MessFee', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage MessFee', 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('hostel','View MessFee');?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'student_id',
		'allotment_id',
		'is_paid',
		'created',
	),
)); ?>
