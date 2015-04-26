<?php $this->breadcrumbs=array(
	'Fuel Consumptions'=>array('/transport'),
	'View',
);
?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
        <td width="247" valign="top">
            <?php $this->renderPartial('/transportation/trans_left');?>
        </td>
        <td valign="top">
            <div class="cont_right">
                <h1>
                    <?php echo Yii::t('transport','FuelConsumption');?>
                </h1>
                <?php 
				$driver=FuelConsumption::model()->findByAttributes(array('id'=>$_REQUEST['id']));
            $vehicle=VehicleDetails::model()->findByAttributes(array('id'=>$driver->vehicle_id));?>
              
			<div class="pdtab_Con">
                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr class="pdtab-h">
                       <td align="center">
                            <?php echo Yii::t('transport','Vehicle Code');?>
                        </td>
                        <td align="center">
                            <?php echo Yii::t('transport','Fuel Consumed');?>
                        </td>
                        <td align="center">
                            <?php echo Yii::t('transport','Amount');?>
                        </td>
                        <td align="center">
                            <?php echo Yii::t('transport','Date');?>
                        </td>
                        <td align="center">
						<?php echo Yii::t('transport','Action');?>
                        </td> 
                    </tr>
                    <tr>
                        <td align="center">
                            <?php echo $vehicle->vehicle_code;?>
                        </td>
                        <td align="center">
                            <?php echo $driver->fuel_consumed;?>
                        </td>
                       <td align="center">
                            <?php echo $driver->amount;?>
                        </td>
                         <td align="center">
                            <?php $settings=UserSettings::model()->findByAttributes(array('user_id'=>Yii::app()->user->id));
							if($settings!=NULL)
							{	
								$date1=date($settings->displaydate,strtotime($driver->consumed_date));
							}
					       
						    echo $date1;?>
                        </td>
                        <td align="center"><?php echo CHtml::link('Edit',array('/transport/FuelConsumption/update','id'=>$_REQUEST['id'])).' | '.CHtml::link('Delete',array('/transport/FuelConsumption/delete','id'=>$_REQUEST['id']),array('confirm'=>'Are you sure?'));?></td>
                    </tr>
                </table>
            </div>
            </div>
        </td>
    </tr>
</table>