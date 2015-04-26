<?php $this->breadcrumbs=array(
	'Stop Details'=>array('/transport'),
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
                <?php $driver=StopDetails::model()->findByAttributes(array('id'=>$_REQUEST['id']));
$vehicle=RouteDetails::model()->findByAttributes(array('id'=>$driver->route_id));
?>
<div class="pdtab_Con" >
                <table width="80%" border="0" cellspacing="0" cellpadding="0">
                    <tr class="pdtab-h">
                        <td>
                            <?php echo Yii::t('transport','Route');?>
                        </td>
                        <td>
                            <?php echo Yii::t('transport','Stop Name');?>
                        </td>
                        <td>
                            <?php echo Yii::t('transport','Fare');?>
                        </td>
                        <td>
                            <?php echo Yii::t('transport','Morning Arrival Time');?>
                        </td>
                        <td>
                            <?php echo Yii::t('transport','Evening Arrival Time');?>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <?php echo $vehicle->route_name;?>
                        </td>
                        <td>
                            <?php echo $driver->stop_name;?>
                        </td>
                        <td>
                            <?php echo $driver->fare;?>
                        </td>
                        <td>
                            <?php echo $driver->arrival_mrng;?>
                        </td>
                        <td>
                            <?php echo $driver->arrival_evng;?>
                        </td>
                    </tr>
                </table>
            </div>
            </div>
        </td>
    </tr>
</table>