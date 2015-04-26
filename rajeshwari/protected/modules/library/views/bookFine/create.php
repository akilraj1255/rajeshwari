<?php
$this->breadcrumbs=array(
	'Book Fines'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List BookFine', 'url'=>array('index')),
	array('label'=>'Manage BookFine', 'url'=>array('admin')),
);
?>

<h1>Create BookFine</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>