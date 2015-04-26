<?php
$this->breadcrumbs=array(
	'Return Books'=>array('/library'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List ReturnBook', 'url'=>array('index')),
	array('label'=>'Create ReturnBook', 'url'=>array('create')),
	array('label'=>'View ReturnBook', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage ReturnBook', 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('library','Update ReturnBook'); ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>