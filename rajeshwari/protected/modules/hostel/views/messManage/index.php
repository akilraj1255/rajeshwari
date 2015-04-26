<?php
$this->breadcrumbs=array(
	'Mess Manages'=>array('/hostel'),
);

$this->menu=array(
	array('label'=>'Create MessManage', 'url'=>array('create')),
	array('label'=>'Manage MessManage', 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('hostel','Mess Manages');?></h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
