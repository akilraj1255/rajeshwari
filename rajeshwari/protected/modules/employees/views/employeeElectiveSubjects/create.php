<?php
$this->breadcrumbs=array(
	'Employee Elective Subjects'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>Yii::t('employees','List EmployeeElectiveSubjects'), 'url'=>array('index')),
	array('label'=>Yii::t('employees','Manage EmployeeElectiveSubjects'), 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('employees','Create EmployeeElectiveSubjects'); ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>