<?php
$this->breadcrumbs=array(
	'Fee Collection Particulars',
);

$this->menu=array(
	array('label'=>Yii::t('fees','Create feeCollectionParticulars'), 'url'=>array('create')),
	array('label'=>Yii::t('fees','Manage feeCollectionParticulars'), 'url'=>array('admin')),
);
?>

<h1>Fee Collection Particulars</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
