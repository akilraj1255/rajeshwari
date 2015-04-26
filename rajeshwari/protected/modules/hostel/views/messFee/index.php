<?php
$this->breadcrumbs=array(
	'Mess Fees'=>array('/hostel'),
);

$this->menu=array(
	array('label'=>'Create MessFee', 'url'=>array('create')),
	array('label'=>'Manage MessFee', 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('hostel','Mess Fees');?></h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
