<?php
$this->breadcrumbs=array(
	'Books',
);

$this->menu=array(
	array('label'=>'Create Book', 'url'=>array('create')),
	array('label'=>'Manage Book', 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('library','Books');?></h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
