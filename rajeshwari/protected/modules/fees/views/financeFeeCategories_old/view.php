<?php
$this->breadcrumbs=array(
	'Finance Fee Categories'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List FinanceFeeCategories', 'url'=>array('index')),
	array('label'=>'Create FinanceFeeCategories', 'url'=>array('create')),
	array('label'=>'Update FinanceFeeCategories', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete FinanceFeeCategories', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage FinanceFeeCategories', 'url'=>array('admin')),
);
?>

<h1>View FinanceFeeCategories #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'description',
		'batch_id',
		'is_deleted',
		'is_master',
		'created_at',
		'updated_at',
	),
)); ?>
