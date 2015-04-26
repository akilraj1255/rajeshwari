<?php
$this->breadcrumbs=array(
	'Roomrequests'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Roomrequest', 'url'=>array('index')),
	array('label'=>'Create Roomrequest', 'url'=>array('create')),
	array('label'=>'View Roomrequest', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Roomrequest', 'url'=>array('admin')),
);
?>

<h1>Update Roomrequest <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>