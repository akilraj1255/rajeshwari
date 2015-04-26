<?php
$this->breadcrumbs=array(
	'Return Books',
);

$this->menu=array(
	array('label'=>'Create ReturnBook', 'url'=>array('create')),
	array('label'=>'Manage ReturnBook', 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('library','Return Books'); ?></h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
