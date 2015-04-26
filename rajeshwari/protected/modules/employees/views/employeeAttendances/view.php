<?php
$this->breadcrumbs=array(
	'Employee Attendances'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>Yii::t('employees','List EmployeeAttendances'), 'url'=>array('index')),
	array('label'=>Yii::t('employees','Create EmployeeAttendances'), 'url'=>array('create')),
	array('label'=>Yii::t('employees','Update EmployeeAttendances'), 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>Yii::t('employees','Delete EmployeeAttendances'), 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>Yii::t('employees','Manage EmployeeAttendances'), 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('employees','View EmployeeAttendances'); ?> #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'attendance_date',
		'employee_id',
		'employee_leave_type_id',
		'reason',
		'is_half_day',
	),
)); ?>
