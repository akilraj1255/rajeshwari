<?php
$this->breadcrumbs=array(
	'Employee Elective Subjects',
);

$this->menu=array(
	array('label'=>Yii::t('employees','Create EmployeeElectiveSubjects'), 'url'=>array('create')),
	array('label'=>Yii::t('employees','Manage EmployeeElectiveSubjects'), 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('employees','Employee Elective Subjects'); ?></h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
