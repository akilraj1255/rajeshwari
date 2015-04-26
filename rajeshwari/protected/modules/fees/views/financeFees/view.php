<?php
$this->breadcrumbs=array(
	'Finance Fees'=>array('/fees'),
	$model->id,
);

$this->menu=array(
	array('label'=>Yii::t('fees','List FinanceFees'), 'url'=>array('index')),
	array('label'=>Yii::t('fees','Create FinanceFees'), 'url'=>array('create')),
	array('label'=>Yii::t('fees','Update FinanceFees'), 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>Yii::t('fees','Delete FinanceFees'), 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>Yii::t('fees','Manage FinanceFees'), 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('fees','View FinanceFees');?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'fee_collection_id',
		'transaction_id',
		'student_id',
		'is_paid',
	),
)); ?>
