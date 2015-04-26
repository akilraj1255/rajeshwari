<?php
$this->breadcrumbs=array(
	'Employee Grades',
);

$this->menu=array(
	array('label'=>Yii::t('employees','Create EmployeeGrades'), 'url'=>array('create')),
	array('label'=>Yii::t('employees','Manage EmployeeGrades'), 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('employees','Employee Grades'); ?></h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
