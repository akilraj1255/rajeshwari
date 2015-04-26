<?php
$this->breadcrumbs=array(
	'Student Documents'=>array('index'),
	$model->title=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List StudentDocument', 'url'=>array('index')),
	array('label'=>'Create StudentDocument', 'url'=>array('create')),
	array('label'=>'View StudentDocument', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage StudentDocument', 'url'=>array('admin')),
);
?>

<h1>Update StudentDocument <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>