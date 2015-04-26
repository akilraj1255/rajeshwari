<?php
$this->breadcrumbs=array(
	'Finance Fee Particulars'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List FinanceFeeParticulars', 'url'=>array('index')),
	array('label'=>'Create FinanceFeeParticulars', 'url'=>array('create')),
	array('label'=>'Update FinanceFeeParticulars', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete FinanceFeeParticulars', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage FinanceFeeParticulars', 'url'=>array('admin')),
);
?>

<h1>View FinanceFeeParticulars #<?php echo $model->id; ?></h1>

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
