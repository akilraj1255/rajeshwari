<?php
$this->breadcrumbs=array(
	'Exam Scores'=>array('/examination'),
	$model->id,
);

$this->menu=array(
	array('label'=>Yii::t('examination','List ExamScores'), 'url'=>array('index')),
	array('label'=>Yii::t('examination','Create ExamScores'), 'url'=>array('create')),
	array('label'=>Yii::t('examination','Update ExamScores'), 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>Yii::t('examination','Delete ExamScores'), 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>Yii::t('examination','Manage ExamScores'), 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('examination','View ExamScores');?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'student_id',
		'exam_id',
		'marks',
		'grading_level_id',
		'remarks',
		'is_failed',
		'created_at',
		'updated_at',
	),
)); ?>
