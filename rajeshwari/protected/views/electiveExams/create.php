<?php
$this->breadcrumbs=array(
	'Elective Exams'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List ElectiveExams', 'url'=>array('index')),
	array('label'=>'Manage ElectiveExams', 'url'=>array('admin')),
);
?>

<h1>Create ElectiveExams</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>