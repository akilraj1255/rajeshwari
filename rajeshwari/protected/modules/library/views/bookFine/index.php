<?php
$this->breadcrumbs=array(
	'Book Fines',
);

$this->menu=array(
	array('label'=>'Create BookFine', 'url'=>array('create')),
	array('label'=>'Manage BookFine', 'url'=>array('admin')),
);
?>

<h1>Book Fines</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
