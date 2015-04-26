<?php
$this->breadcrumbs=array(
	'Finance Fee Categories',
);

$this->menu=array(
	array('label'=>'Create FinanceFeeCategories', 'url'=>array('create')),
	array('label'=>'Manage FinanceFeeCategories', 'url'=>array('admin')),
);
?>

<h1>Finance Fee Categories</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
