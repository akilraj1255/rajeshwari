<?php $this->breadcrumbs=array(
	'Bus Logs'=>array('/transport'),
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
                    <?php echo Yii::t('transport','BusLog');?>
                </h1>
                <?php $driver=BusLog::model()->findByAttributes(array('id'=>$_REQUEST['id']));
$vehicle=VehicleDetails::model()->findByAttributes(array('id'=>$driver->vehicle_id));
?>
              <div class="pdtab_Con">
                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr class="pdtab-h">
                        <td align="center">
                            <?php echo Yii::t('transport','Vehicle Code');?>
                        </td>
                       <td align="center">
                            <?php echo Yii::t('transport','Start Time Reading');?>
                        </td>
                         <td align="center">
                            <?php echo Yii::t('transport','End Time Reading');?>
                        </td>
                    </tr>
                    <tr>
                        <td align="center">
                            <?php echo $vehicle->vehicle_code;?>
                        </td>
                        <td align="center">
                            <?php echo $driver->start_time_reading;?>
                        </td>
                         <td align="center">
                            <?php echo $driver->end_time_reading;?>
                        </td>
                    </tr>
                </table>
              </div>
            </div>
        </td>
    </tr>
</table>