<?php
$this->breadcrumbs=array(
	'Bus Logs'=>array('/transport'),
	'Manage',
);?>
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'vacate-form',
	'enableAjaxValidation'=>false,
)); ?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="247" valign="top">
  <?php $this->renderPartial('/transportation/trans_left');?>
 </td>
    <td valign="top"> 
    <div class="cont_right">
     <h1><?php echo Yii::t('transport','Bus Log');?></h1>
      <div class="edit_bttns" style="top:20px; right:20px;">
    <ul>
    <li> <?php echo CHtml::link('<span>'.Yii::t('hostel','Create New Bus Log').'</span>', array('/transport/BusLog/create'),array('class'=>'addbttn last ')); ?></li>
    </ul>
    </div>
    <?php $route=BusLog::model()->findAll();
	
		?>
         <div class="pdtab_Con">
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
         <tr class="pdtab-h">
        	<td align="center"><?php echo Yii::t('transport','Vehicle Code');?></td>
        	<td align="center"><?php echo Yii::t('transport','Start Time Reading');?></td>
            <td align="center"><?php echo Yii::t('transport','End Time Reading');?></td>
            <td align="center"><?php echo Yii::t('transport','Fuel Consumption');?></td>
            <td align="center"><?php echo Yii::t('transport','Action');?></td>
        </tr>
        <?php
		if($route!=NULL)
		{
		foreach($route as $route_1)
		{
			
			$vehicle=VehicleDetails::model()->findByAttributes(array('id'=>$route_1->vehicle_id));
			$fuel =FuelConsumption::model()->findByAttributes(array('vehicle_id'=>$route_1->vehicle_id));
			
				?>
                <tr>
                	<td align="center"><?php echo $vehicle->vehicle_code;?></td>
                    <td align="center"><?php echo $route_1->start_time_reading;?></td>
                    <td align="center"><?php echo $route_1->end_time_reading ;?></td>
                    <td align="center"><?php if($fuel == NULL) {echo CHtml::link(Yii::t('transport','Record Consumption Details'),array('/transport/FuelConsumption/create','id'=>$route_1->id,'vehicle_id'=>$route_1->vehicle_id)); }
					else{ echo CHtml::link(Yii::t('transport','View Consumption Details'),array('/transport/FuelConsumption/view','id'=>$fuel->id,'vehicle_id'=>$route_1->vehicle_id));}?></td>
                     <td align="center"><?php echo CHtml::link('Edit',array('/transport/BusLog/update','id'=>$route_1->id)).' | '.CHtml::link('Delete',array('/transport/BusLog/delete','id'=>$route_1->id),array('confirm'=>'Are you sure?'));?></td>
                </tr>
                <?php
		
			
		}
		?>
        
        <?php
		
		
	}
		else
	{
		  echo '<tr><td align="center" colspan="5"><strong>'.Yii::t('transport','No data available').'</strong></td></tr>';
	}
	?>
    </table>
        </div>
     
     </div>
     </td>
     </tr>
     </table>
<?php $this->endWidget(); ?>