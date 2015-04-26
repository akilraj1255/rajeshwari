<?php
$this->breadcrumbs=array(
	'Savedsearches'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>Yii::t('employees','List Savedsearches'), 'url'=>array('index')),
	array('label'=>Yii::t('employees','Create Savedsearches'), 'url'=>array('create')),
	array('label'=>Yii::t('employees','View Savedsearches'), 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>Yii::t('employees','Manage Savedsearches'), 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('employees','Update Savedsearches'); ?> <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>