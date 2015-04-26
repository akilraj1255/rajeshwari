<?php
$this->breadcrumbs=array(
	Yii::t('timetable','Timetable Entries'),
);

$this->menu=array(
	array('label'=>'Create TimetableEntries', 'url'=>array('create')),
	array('label'=>'Manage TimetableEntries', 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('timetable','Timetable Entries'); ?></h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
