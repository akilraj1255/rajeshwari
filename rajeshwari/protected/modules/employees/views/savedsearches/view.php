<?php
$this->breadcrumbs=array(
	'Savedsearches'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>Yii::t('employees','List Savedsearches'), 'url'=>array('index')),
	array('label'=>Yii::t('employees','Create Savedsearches'), 'url'=>array('create')),
	array('label'=>Yii::t('employees','Update Savedsearches'), 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>Yii::t('employees','Delete Savedsearches'), 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>Yii::t('employees','Manage Savedsearches'), 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('employees','View Savedsearches'); ?> #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'user_id',
		'url',
		'type',
		'name',
	),
)); ?>
