<?php
$this->breadcrumbs=array(
	'Bus Logs'=>array('/transport'),
);

$this->menu=array(
	array('label'=>'Create BusLog', 'url'=>array('create')),
	array('label'=>'Manage BusLog', 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('transport','Bus Logs');?></h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
