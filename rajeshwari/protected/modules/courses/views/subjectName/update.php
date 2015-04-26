<?php
$this->breadcrumbs=array(
	Yii::t('Subjects','Subject Names')=>array('/courses'),
	$model->name=>array('view','id'=>$model->id),
	Yii::t('Subjects','Update'),
);

$this->menu=array(
	array('label'=>'List SubjectName', 'url'=>array('index')),
	array('label'=>'Create SubjectName', 'url'=>array('create')),
	array('label'=>'View SubjectName', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage SubjectName', 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('Subjects','Update Subject Name').$model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>