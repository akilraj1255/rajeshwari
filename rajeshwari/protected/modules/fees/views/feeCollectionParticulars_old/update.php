<?php
$this->breadcrumbs=array(
	'Fee Collection Particulars'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>Yii::t('fees','List feeCollectionParticulars'), 'url'=>array('index')),
	array('label'=>Yii::t('fees','Create feeCollectionParticulars'), 'url'=>array('create')),
	array('label'=>Yii::t('fees','View feeCollectionParticulars'), 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>Yii::t('fees','Manage feeCollectionParticulars'), 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('fees','Update feeCollectionParticulars'); ?> <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>