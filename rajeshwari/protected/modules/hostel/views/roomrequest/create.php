<?php
$this->breadcrumbs=array(
	'Roomrequests'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Roomrequest', 'url'=>array('index')),
	array('label'=>'Manage Roomrequest', 'url'=>array('admin')),
);
?>

<h1>Create Roomrequest</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>