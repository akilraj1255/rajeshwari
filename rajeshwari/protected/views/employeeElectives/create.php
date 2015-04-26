<?php
$this->breadcrumbs=array(
	'Employee Electives'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List EmployeeElectives', 'url'=>array('index')),
	array('label'=>'Manage EmployeeElectives', 'url'=>array('admin')),
);
?>

<h1>Create EmployeeElectives</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>