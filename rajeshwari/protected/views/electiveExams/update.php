<?php
$this->breadcrumbs=array(
	'Elective Exams'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List ElectiveExams', 'url'=>array('index')),
	array('label'=>'Create ElectiveExams', 'url'=>array('create')),
	array('label'=>'View ElectiveExams', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage ElectiveExams', 'url'=>array('admin')),
);
?>

<h1>Update ElectiveExams <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>