<?php
$this->breadcrumbs=array(
	'Employee Elective Subjects'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>Yii::t('employees','List EmployeeElectiveSubjects'), 'url'=>array('index')),
	array('label'=>Yii::t('employees','Create EmployeeElectiveSubjects'), 'url'=>array('create')),
	array('label'=>Yii::t('employees','View EmployeeElectiveSubjects'), 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>Yii::t('employees','Manage EmployeeElectiveSubjects'), 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('employees','Update EmployeeElectiveSubjects'); ?> <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>