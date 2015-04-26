<?php
$this->breadcrumbs=array(
	'Employee Categories',
);

$this->menu=array(
	array('label'=>Yii::t('employees','Create EmployeeCategories'), 'url'=>array('create')),
	array('label'=>Yii::t('employees','Manage EmployeeCategories'), 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('employees','Employee Categories'); ?></h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
