<?php
$this->breadcrumbs=array(
	'Rooms'=>array('/hostel'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Room', 'url'=>array('index')),
	array('label'=>'Create Room', 'url'=>array('create')),
	array('label'=>'View Room', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Room', 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('hostel','Update Room');?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>