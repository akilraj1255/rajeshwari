<?php
$this->breadcrumbs=array(
	'Vacates'=>array('/hostel'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Vacate', 'url'=>array('index')),
	array('label'=>'Create Vacate', 'url'=>array('create')),
	array('label'=>'View Vacate', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Vacate', 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('hostel','Update Vacate');?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>