<?php
$this->breadcrumbs=array(
	Yii::t('examination','Exam Groups')=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List Exam Groups', 'url'=>array('index')),
	array('label'=>'Create Exam Groups', 'url'=>array('create')),
	array('label'=>'Update Exam Groups', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Exam Groups', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Exam Groups', 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('examination','View Exam Groups');?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'batch_id',
		'exam_type',
		'is_published',
		'result_published',
		'exam_date',
	),
)); ?>
