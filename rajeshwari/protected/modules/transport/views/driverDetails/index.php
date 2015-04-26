<?php
$this->breadcrumbs=array(
	'Driver Details'=>array('/transport'),
);

$this->menu=array(
	array('label'=>'Create DriverDetails', 'url'=>array('create')),
	array('label'=>'Manage DriverDetails', 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('transport','Driver Details');?></h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
