<?php
$this->breadcrumbs=array(
	'Rooms',
);

$this->menu=array(
	array('label'=>'Create Room', 'url'=>array('create')),
	array('label'=>'Manage Room', 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('hostel','Rooms');?></h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
