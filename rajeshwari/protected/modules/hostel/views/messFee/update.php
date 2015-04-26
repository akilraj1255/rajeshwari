<?php
$this->breadcrumbs=array(
	'Mess Fees'=>array('/hostel'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List MessFee', 'url'=>array('index')),
	array('label'=>'Create MessFee', 'url'=>array('create')),
	array('label'=>'View MessFee', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage MessFee', 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('hostel','Update MessFee');?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>