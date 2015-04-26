<?php
$this->breadcrumbs=array(
	Yii::t('Subjects','Subject Names'),
);

$this->menu=array(
	array('label'=>'Create SubjectName', 'url'=>array('create')),
	array('label'=>'Manage SubjectName', 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('Subjects','Subject Names'); ?></h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
