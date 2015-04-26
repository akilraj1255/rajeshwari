<?php
$this->breadcrumbs=array(
	'Fuel Consumptions'=>array('/transport'),
);

$this->menu=array(
	array('label'=>'Create FuelConsumption', 'url'=>array('create')),
	array('label'=>'Manage FuelConsumption', 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('transport','Fuel Consumptions');?></h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
