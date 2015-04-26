<?php
$this->breadcrumbs=array(
	'Finance Fee Categories'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List FinanceFeeCategories', 'url'=>array('index')),
	array('label'=>'Create FinanceFeeCategories', 'url'=>array('create')),
	array('label'=>'View FinanceFeeCategories', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage FinanceFeeCategories', 'url'=>array('admin')),
);
?>

<h1>Update FinanceFeeCategories <?php echo $model->id; ?></h1><br />

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>