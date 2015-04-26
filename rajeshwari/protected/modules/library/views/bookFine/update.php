<?php
$this->breadcrumbs=array(
	'Book Fines'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List BookFine', 'url'=>array('index')),
	array('label'=>'Create BookFine', 'url'=>array('create')),
	array('label'=>'View BookFine', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage BookFine', 'url'=>array('admin')),
);
?>

<h1>Update BookFine <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>