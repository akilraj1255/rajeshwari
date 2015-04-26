<?php
$this->breadcrumbs=array(
	Yii::t('weekdays','Weekdays')=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	Yii::t('weekdays','Update'),
);

$this->menu=array(
	array('label'=>'List Weekdays', 'url'=>array('index')),
	array('label'=>'Create Weekdays', 'url'=>array('create')),
	array('label'=>'View Weekdays', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Weekdays', 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('weekdays','Update Weekdays').$model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>