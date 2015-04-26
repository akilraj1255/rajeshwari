<?php
$this->breadcrumbs=array(
	'Finance Fee Collections'=>array('/fees'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>Yii::t('fees','List FinanceFeeCollections'), 'url'=>array('index')),
	array('label'=>Yii::t('fees','Create FinanceFeeCollections'), 'url'=>array('create')),
	array('label'=>Yii::t('fees','View FinanceFeeCollections'), 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>Yii::t('fees','Manage FinanceFeeCollections'), 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('fees','Update FinanceFeeCollections'); ?> <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>