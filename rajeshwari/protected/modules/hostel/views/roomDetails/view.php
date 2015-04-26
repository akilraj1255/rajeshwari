<?php
$this->breadcrumbs=array(
	'Room Details'=>array('index'),
	$model->id,
);
?>

<h1>View RoomDetails</h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'bed_no',
		'no_of_floors',
		'mode_of_allotment',
		'created',
	),
)); ?>
