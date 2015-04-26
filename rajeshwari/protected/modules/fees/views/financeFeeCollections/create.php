<?php
$this->breadcrumbs=array(
	'Finance Fee Collections'=>array('/fees'),
	'Create',
);

$this->menu=array(
	array('label'=>Yii::t('fees','List FinanceFeeCollections'), 'url'=>array('index')),
	array('label'=>Yii::t('fees','Manage FinanceFeeCollections'), 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('fees','Create FinanceFeeCollections');?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>