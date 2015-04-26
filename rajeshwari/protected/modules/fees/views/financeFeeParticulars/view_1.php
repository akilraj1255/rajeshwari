<?php
$this->breadcrumbs=array(
	'Finance Fee Particulars'=>array('/fees'),
	$model->name,
);

/**$this->menu=array(
	array('label'=>'List ', 'url'=>array('index')),
	array('label'=>'Create ', 'url'=>array('create')),
	array('label'=>'Update ', 'url'=>array('update', 'id'=>$model->)),
	array('label'=>'Delete ', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage ', 'url'=>array('admin')),
);*/
?>

<h1><?php echo Yii::t('fees','View FinanceFeeParticulars');?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'description',
		'amount',
		'finance_fee_category_id',
		'student_category_id',
		'admission_no',
		'student_id',
		'is_deleted',
		'created_at',
		'updated_at',
	),
)); ?>
