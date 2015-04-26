<?php
$this->breadcrumbs=array(
	'Vehicle Details'=>array('/transport'),
);

$this->menu=array(
	array('label'=>'Create VehicleDetails', 'url'=>array('create')),
	array('label'=>'Manage VehicleDetails', 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('transport','Vehicle Details');?></h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
