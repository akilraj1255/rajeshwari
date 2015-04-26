<?php
$this->breadcrumbs=array(
	'Finance Fee Particulars'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List FinanceFeeParticulars', 'url'=>array('index')),
	array('label'=>'Create FinanceFeeParticulars', 'url'=>array('create')),
	array('label'=>'View FinanceFeeParticulars', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage FinanceFeeParticulars', 'url'=>array('admin')),
);
?>

<h1>Update FinanceFeeParticulars <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>