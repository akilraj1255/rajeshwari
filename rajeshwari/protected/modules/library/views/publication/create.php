<?php
$this->breadcrumbs=array(
	'Publications'=>array('/library'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Publication', 'url'=>array('index')),
	array('label'=>'Manage Publication', 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('library','Create Publication');?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>