<?php
$this->breadcrumbs=array(
	'Categories'=>array('/library'),
	$model->cat_id=>array('view','id'=>$model->cat_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Category', 'url'=>array('index')),
	array('label'=>'Create Category', 'url'=>array('create')),
	array('label'=>'View Category', 'url'=>array('view', 'id'=>$model->cat_id)),
	array('label'=>'Manage Category', 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('library','Update Category');?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>