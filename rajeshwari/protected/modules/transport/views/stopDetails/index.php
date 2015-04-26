<?php
$this->breadcrumbs=array(
	'Stop Details'=>array('/transport'),
);

$this->menu=array(
	array('label'=>'Create StopDetails', 'url'=>array('create')),
	array('label'=>'Manage StopDetails', 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('transport','Stop Details');?></h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
