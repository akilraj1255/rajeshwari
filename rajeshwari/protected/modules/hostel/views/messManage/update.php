<?php
$this->breadcrumbs=array(
	'Mess Manages'=>array('/hostel'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List MessManage', 'url'=>array('index')),
	array('label'=>'Create MessManage', 'url'=>array('create')),
	array('label'=>'View MessManage', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage MessManage', 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('hostel','Update MessManage');?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>