<?php
$this->breadcrumbs=array(
	'Savedsearches',
);

$this->menu=array(
	array('label'=>Yii::t('employees','Create Savedsearches'), 'url'=>array('create')),
	array('label'=>Yii::t('employees','Manage Savedsearches'), 'url'=>array('admin')),
);
?>

<h1>Savedsearches</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
