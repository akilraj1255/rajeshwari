<?php
$this->breadcrumbs=array(
	'Roomrequests'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Roomrequest', 'url'=>array('index')),
	array('label'=>'Create Roomrequest', 'url'=>array('create')),
	array('label'=>'Update Roomrequest', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Roomrequest', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Roomrequest', 'url'=>array('admin')),
);
?>

<h1>View Roomrequest #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'student_id',
		'allot_id',
		'status',
	),
)); ?>
