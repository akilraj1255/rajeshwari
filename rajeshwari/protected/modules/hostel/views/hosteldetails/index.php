<?php
$this->breadcrumbs=array(
	'Hosteldetails'=>array('/hostel'),
	'Manage',
);

$this->menu=array(
	array('label'=>'Create Hosteldetails', 'url'=>array('create')),
	array('label'=>'Manage Hosteldetails', 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('hostel','Hosteldetails');?></h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
