<?php
$this->breadcrumbs=array(
	'Employee Elective Subjects'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>Yii::t('employees','List EmployeeElectiveSubjects'), 'url'=>array('index')),
	array('label'=>Yii::t('employees','Create EmployeeElectiveSubjects'), 'url'=>array('create')),
	array('label'=>Yii::t('employees','Update EmployeeElectiveSubjects'), 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>Yii::t('employees','Delete EmployeeElectiveSubjects'), 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>Yii::t('employees','Manage EmployeeElectiveSubjects'), 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('employees','View EmployeeElectiveSubjects'); ?> #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'employee_id',
		'elective_id',
		'subject_id',
	),
)); ?>
