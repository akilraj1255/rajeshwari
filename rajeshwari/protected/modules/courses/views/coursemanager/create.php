<?php
$this->breadcrumbs=array(
	'Coursemanagers'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Coursemanager', 'url'=>array('index')),
	array('label'=>'Manage Coursemanager', 'url'=>array('admin')),
);
?>

<h1>Create Coursemanager</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>