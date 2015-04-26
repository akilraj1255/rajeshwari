<?php
$this->breadcrumbs=array(
	'Registrations'=>array('/hostel'),
);

$this->menu=array(
	array('label'=>'Create Registration', 'url'=>array('create')),
	array('label'=>'Manage Registration', 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('hostel','Registrations');?></h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
