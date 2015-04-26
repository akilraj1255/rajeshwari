<?php
$this->breadcrumbs=array(
	'Coursemanagers'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Coursemanager', 'url'=>array('index')),
	array('label'=>'Create Coursemanager', 'url'=>array('create')),
	array('label'=>'Update Coursemanager', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Coursemanager', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Coursemanager', 'url'=>array('admin')),
);
?>

<h1>View Coursemanager #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'user_id',
		'course_1',
		'course_2',
		'course_3',
		'course_4',
		'course_5',
	),
)); ?>
