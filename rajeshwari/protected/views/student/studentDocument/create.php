<?php
$this->breadcrumbs=array(
	'Student Documents'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List StudentDocument', 'url'=>array('index')),
	array('label'=>'Manage StudentDocument', 'url'=>array('admin')),
);
?>

<h1>Create StudentDocument</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>