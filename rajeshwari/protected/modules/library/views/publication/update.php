<?php
$this->breadcrumbs=array(
	'Publications'=>array('/library'),
	$model->name=>array('view','id'=>$model->publication_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Publication', 'url'=>array('index')),
	array('label'=>'Create Publication', 'url'=>array('create')),
	array('label'=>'View Publication', 'url'=>array('view', 'id'=>$model->publication_id)),
	array('label'=>'Manage Publication', 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('library','Update Publication');?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>