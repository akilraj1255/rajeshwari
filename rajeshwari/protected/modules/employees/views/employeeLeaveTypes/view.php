<?php
$this->breadcrumbs=array(
	'Employee Leave Types'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>Yii::t('employees','List EmployeeLeaveTypes'), 'url'=>array('index')),
	array('label'=>Yii::t('employees','Create EmployeeLeaveTypes'), 'url'=>array('create')),
	array('label'=>Yii::t('employees','Update EmployeeLeaveTypes'), 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>Yii::t('employees','Delete EmployeeLeaveTypes'), 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>Yii::t('employees','Manage EmployeeLeaveTypes'), 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('employees','View EmployeeLeaveTypes'); ?> #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'code',
		'status',
		'max_leave_count',
		'carry_forward',
	),
)); ?>
