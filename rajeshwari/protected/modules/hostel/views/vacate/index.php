<?php
$this->breadcrumbs=array(
	'Vacates',
);

$this->menu=array(
	array('label'=>'Create Vacate', 'url'=>array('create')),
	array('label'=>'Manage Vacate', 'url'=>array('admin')),
);
?>

<h1>Vacates</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
