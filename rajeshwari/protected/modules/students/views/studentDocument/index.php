<?php
$this->breadcrumbs=array(
	'Student Documents',
);

$this->menu=array(
	array('label'=>'Create StudentDocument', 'url'=>array('create')),
	array('label'=>'Manage StudentDocument', 'url'=>array('admin')),
);
?>

<h1>Student Documents</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
