<?php
$this->breadcrumbs=array(
	'Transportations'=>array('/transport'),
);

$this->menu=array(
	array('label'=>'Create Transportation', 'url'=>array('create')),
	array('label'=>'Manage Transportation', 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('transport','Transportations');?></h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
