<?php
$this->breadcrumbs=array(
	'Publications'=>array('/library'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List Publication', 'url'=>array('index')),
	array('label'=>'Create Publication', 'url'=>array('create')),
	array('label'=>'Update Publication', 'url'=>array('update', 'id'=>$model->publication_id)),
	array('label'=>'Delete Publication', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->publication_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Publication', 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('library','View Publication');?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'publication_id',
		'name',
		'location',
	),
)); ?>
