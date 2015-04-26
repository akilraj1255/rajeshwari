<?php
$this->breadcrumbs=array(
	'Employee Electives'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List EmployeeElectives', 'url'=>array('index')),
	array('label'=>'Create EmployeeElectives', 'url'=>array('create')),
	array('label'=>'Update EmployeeElectives', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete EmployeeElectives', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage EmployeeElectives', 'url'=>array('admin')),
);
?>

<h1>View EmployeeElectives #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'employee_id',
		'elective_id',
	),
)); ?>
