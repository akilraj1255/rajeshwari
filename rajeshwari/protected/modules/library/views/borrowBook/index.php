<?php
$this->breadcrumbs=array(
	'Borrow Books',
);

$this->menu=array(
	array('label'=>'Create BorrowBook', 'url'=>array('create')),
	array('label'=>'Manage BorrowBook', 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('library','Borrow Books');?></h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
