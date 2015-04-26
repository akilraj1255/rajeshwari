<?php
$this->breadcrumbs=array(
	'Transportations'=>array('/transport'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Transportation', 'url'=>array('index')),
	array('label'=>'Create Transportation', 'url'=>array('create')),
	array('label'=>'View Transportation', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Transportation', 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('transport','Update Transportation');?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>