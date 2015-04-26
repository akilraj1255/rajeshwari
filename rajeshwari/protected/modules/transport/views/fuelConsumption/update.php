<?php
$this->breadcrumbs=array(
	'Fuel Consumptions'=>array('/transport'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

//$this->menu=array(
//	array('label'=>'List FuelConsumption', 'url'=>array('index')),
//	array('label'=>'Create FuelConsumption', 'url'=>array('create')),
//	array('label'=>'View FuelConsumption', 'url'=>array('view', 'id'=>$model->id)),
//	array('label'=>'Manage FuelConsumption', 'url'=>array('admin')),
//);
?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="247" valign="top">
    <?php $this->renderPartial('/transportation/trans_left');?>
 </td>
    <td valign="top"> 
    <div class="cont_right">

<h1><?php echo Yii::t('transport','Update FuelConsumption');?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
</div>
</td>
</tr>
</table>