<?php
$this->breadcrumbs=array(
	'Finance Fees'=>array('/fees'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>Yii::t('fees','List FinanceFees'), 'url'=>array('index')),
	array('label'=>Yii::t('fees','Create FinanceFees'), 'url'=>array('create')),
	array('label'=>Yii::t('fees','View FinanceFees'), 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>Yii::t('fees','Manage FinanceFees'), 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('fees','Update FinanceFees');?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>