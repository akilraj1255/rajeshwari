<?php
$this->breadcrumbs=array(
	'Mess Fees'=>array('/hostel'),
	'Create',
);

$this->menu=array(
	array('label'=>'List MessFee', 'url'=>array('index')),
	array('label'=>'Manage MessFee', 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('hostel','Create MessFee');?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>