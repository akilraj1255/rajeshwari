<?php
$this->breadcrumbs=array(
	'Book Fines'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List BookFine', 'url'=>array('index')),
	array('label'=>'Create BookFine', 'url'=>array('create')),
	array('label'=>'Update BookFine', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete BookFine', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage BookFine', 'url'=>array('admin')),
);
?>

<h1>View BookFine #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'student_id',
		'book_id',
		'amount',
	),
)); ?>
