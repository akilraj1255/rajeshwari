<?php
$this->breadcrumbs=array(
	'Route Details'=>array('/transport'),
);

$this->menu=array(
	array('label'=>'Create RouteDetails', 'url'=>array('create')),
	array('label'=>'Manage RouteDetails', 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('transport','Route Details');?></h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
