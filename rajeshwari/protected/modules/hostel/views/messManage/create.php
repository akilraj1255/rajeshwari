<?php
$this->breadcrumbs=array(
	'Mess Manages'=>array('/hostel'),
	'Create',
);

$this->menu=array(
	array('label'=>'List MessManage', 'url'=>array('index')),
	array('label'=>'Manage MessManage', 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('hostel','Create MessManage');?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>