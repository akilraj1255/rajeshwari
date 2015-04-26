<?php
$this->breadcrumbs=array(
	'Registrations'=>array('/hostel'),
	$model->id,
);

?>

<h1><?php echo Yii::t('hostel','View Registration');?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'student_id',
		'food_preference',
		'desc',
	),
)); ?>
