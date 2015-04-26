<?php
$this->breadcrumbs=array(
	'Employee Positions',
);

$this->menu=array(
	array('label'=>Yii::t('employees','Create EmployeePositions'), 'url'=>array('create')),
	array('label'=>Yii::t('employees','Manage EmployeePositions'), 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('employees','Employee Positions'); ?></h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
