<?php
$this->breadcrumbs=array(
	Yii::t('attendance','Employee Leave Types')=>array('index'),
	Yii::t('attendance','Create'),
);

$this->menu=array(
	array('label'=>'List EmployeeLeaveTypes', 'url'=>array('index')),
	array('label'=>'Manage EmployeeLeaveTypes', 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('attendance','Create Employee Leave Types');?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>