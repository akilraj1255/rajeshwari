<?php
$this->breadcrumbs=array(
	'Food Infos'=>array('/hostel'),
	'Manage',
);
$this->menu=array(
	array('label'=>'Create FoodInfo', 'url'=>array('create')),
	array('label'=>'Manage FoodInfo', 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('hostel','Food Infos');?></h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
