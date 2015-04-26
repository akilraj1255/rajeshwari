<?php
$this->breadcrumbs=array(
	'Employee Electives',
);

$this->menu=array(
	array('label'=>'Create EmployeeElectives', 'url'=>array('create')),
	array('label'=>'Manage EmployeeElectives', 'url'=>array('admin')),
);
?>

<h1>Employee Electives</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
