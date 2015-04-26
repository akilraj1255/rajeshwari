<?php
$this->breadcrumbs=array(
	'Coursemanagers',
);

$this->menu=array(
	array('label'=>'Create Coursemanager', 'url'=>array('create')),
	array('label'=>'Manage Coursemanager', 'url'=>array('admin')),
);
?>

<h1>Coursemanagers</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
