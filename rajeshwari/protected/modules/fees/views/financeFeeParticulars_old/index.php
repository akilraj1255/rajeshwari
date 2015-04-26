<?php
$this->breadcrumbs=array(
	'Finance Fee Particulars',
);

$this->menu=array(
	array('label'=>'Create FinanceFeeParticulars', 'url'=>array('create')),
	array('label'=>'Manage FinanceFeeParticulars', 'url'=>array('admin')),
);
?>

<h1>Finance Fee Particulars</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
