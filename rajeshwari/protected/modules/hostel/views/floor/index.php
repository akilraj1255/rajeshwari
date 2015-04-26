<?php
$this->breadcrumbs=array(
	'Floors'=>array('/hostel'),
	'Manage',
);

?>

<h1><?php echo Yii::t('hostel','Floors');?></h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
