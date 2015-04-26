<?php
$this->breadcrumbs=array(
	'Employee Electives'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List EmployeeElectives', 'url'=>array('index')),
	array('label'=>'Create EmployeeElectives', 'url'=>array('create')),
	array('label'=>'View EmployeeElectives', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage EmployeeElectives', 'url'=>array('admin')),
);
?>

<h1>Update EmployeeElectives <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>