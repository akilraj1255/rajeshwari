<?php
$this->breadcrumbs=array(
	'Class Timings'=>array('/timetable'),
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

<h1><?php echo Yii::t('timetable','View ClassTimings');?></h1>
<div class="tableinnerlist">
<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'batch_id',
		'name',
		'start_time',
		'end_time',
		'is_break',
	),
)); ?>


</div>