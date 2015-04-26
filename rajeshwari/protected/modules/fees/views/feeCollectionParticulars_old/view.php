<?php
$this->breadcrumbs=array(
	'Fee Collection Particulars'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>Yii::t('fees','List feeCollectionParticulars'), 'url'=>array('index')),
	array('label'=>Yii::t('fees','Create feeCollectionParticulars'), 'url'=>array('create')),
	array('label'=>Yii::t('fees','Update feeCollectionParticulars'), 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>Yii::t('fees','Delete feeCollectionParticulars'), 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>Yii::t('fees','Manage feeCollectionParticulars'), 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('fees','View feeCollectionParticulars'); ?> #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'description',
		'amount',
		'finance_fee_collection_id',
		'student_category_id',
		'admission_no',
		'student_id',
		'is_deleted',
		'created_at',
		'updated_at',
	),
)); ?>
