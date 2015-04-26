<?php
$this->breadcrumbs=array(
	'Coursemanagers'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Coursemanager', 'url'=>array('index')),
	array('label'=>'Create Coursemanager', 'url'=>array('create')),
	array('label'=>'View Coursemanager', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Coursemanager', 'url'=>array('admin')),
);
?>

<h1>Update Coursemanager <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('/courses/manage', array('model'=>$model)); ?>