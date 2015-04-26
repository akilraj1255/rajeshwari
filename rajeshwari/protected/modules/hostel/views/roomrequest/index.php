<?php
$this->breadcrumbs=array(
	'Roomrequests',
);

$this->menu=array(
	array('label'=>'Create Roomrequest', 'url'=>array('create')),
	array('label'=>'Manage Roomrequest', 'url'=>array('admin')),
);
?>

<h1>Roomrequests</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
