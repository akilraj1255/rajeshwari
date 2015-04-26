<?php
$this->breadcrumbs=array(
	'Route Details'=>array('/transport'),
	'RouteDetails',
);?>
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'vacate-form',
	'enableAjaxValidation'=>false,
)); ?>
<?php echo '<strong>'.CHtml::label(Yii::t('transport','Select Route'),'').'</strong>';
//echo CHtml::dropDownList('routeid','',array(),array('prompt'=>'Select','id'=>'stopid'));
echo CHtml::dropDownList('routeid','',CHtml::listData(RouteDetails::model()->findAll(),'id','route_name'),array('prompt'=>'Select','id'=>'route_id','submit'=>array('RouteDetails/routedetails')));	
?>
<?php if(isset($routeid))
{
if($routeid==NULL)
{
	echo '<div align="center">'.Yii::t('transport','Sorry!!&nbsp;No data available now.').'</div>';
}
else
{
	$routedetails=RouteDetails::model()->findByAttributes(array('id'=>$routeid));
	$vehicle=VehicleDetails::model()->findByAttributes(array('id'=>$routedetails->vehicle_id));
	$stop=StopDetails::model()->findAllByAttributes(array('route_id'=>$routeid));
	if($stop==NULL)
	{ 
			echo '<div align="center"><strong>'.Yii::t('transport','Sorry!!&nbsp;No data available now.').'</strong></div>';
	}
	else
	{
		?>
<table width="22%" border="0" cellspacing="0" cellpadding="0">
    <tr>
       
        <td><?php echo Yii::t('transport','Route');?></td>
        <td><?php echo Yii::t('transport','Stop');?></td>
        <td><?php echo Yii::t('transport','Vehicle ID');?></td>
        <td><?php echo Yii::t('transport','Fare');?></td>
        <td><?php echo Yii::t('transport','Arrival Time');?></td>
        <td><?php echo Yii::t('transport','Arrival Time Evening');?></td>
    </tr>
    <?php foreach($stop as $stop_1)
		{
		?>
    <tr>
       
        <td>
            <?php echo $routedetails->route_name;?>
        </td>
        <td>
            <?php echo $stop_1->stop_name;?>
        </td>
         <td>
            <?php echo $vehicle->vehicle_code;?>
        </td>
        <td>
            <?php echo $stop_1->fare;?>
        </td>
        <td>
            <?php echo $stop_1->arrival_mrng;?>
        </td>
        <td>
            <?php echo $stop_1->arrival_evng;?>
        </td>
    </tr>
    <?php }
		?>
</table>
<?php }
}
}
?>
<?php $this->endWidget(); ?>