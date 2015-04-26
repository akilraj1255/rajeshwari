<?php
$this->breadcrumbs=array(
	'Publications',
);

$this->menu=array(
	array('label'=>'Create Publication', 'url'=>array('create')),
	array('label'=>'Manage Publication', 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('library','Publications');?></h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
