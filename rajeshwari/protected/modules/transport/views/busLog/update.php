<?php
$this->breadcrumbs=array(
	'Bus Logs'=>array('/transport'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

//$this->menu=array(
//	array('label'=>'List BusLog', 'url'=>array('index')),
//	array('label'=>'Create BusLog', 'url'=>array('create')),
//	array('label'=>'View BusLog', 'url'=>array('view', 'id'=>$model->id)),
//	array('label'=>'Manage BusLog', 'url'=>array('admin')),
//);
?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="247" valign="top">
    <?php $this->renderPartial('/transportation/trans_left');?>
 </td>
    <td valign="top"> 
    <div class="cont_right">

<h1><?php echo Yii::t('transport','Update BusLog');?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
</div>
</td>
</tr>
</table>