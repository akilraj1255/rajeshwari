<?php
$this->breadcrumbs=array(
	'Timetable Entries'=>array('/timetable'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List TimetableEntries', 'url'=>array('index')),
	array('label'=>'Create TimetableEntries', 'url'=>array('create')),
	array('label'=>'View TimetableEntries', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage TimetableEntries', 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('timetable','Update TimetableEntries');?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>