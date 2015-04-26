<?php $this->breadcrumbs=array(
	'Vehicle Details'=>array('/transport'),
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
                    <?php echo Yii::t('transport','Vehicle Details');?>
                </h1>
                <?php $driver=VehicleDetails::model()->findByAttributes(array('id'=>$_REQUEST['id']));
?>
                <div class="pdtab_Con" >
                <table width="80%" border="0" cellspacing="0" cellpadding="0" style="text-align:center;">
                    <tr class="pdtab-h" style="font-weight:bold;">
                        <td>
                            <?php echo Yii::t('transport','Vehicle No');?>
                        </td>
                        <td>
                            <?php echo Yii::t('transport','Vehicle Code');?>
                        </td>
                        <td>
                            <?php echo Yii::t('transport','No Of Seats');?>
                        </td>
                        <td>
                            <?php echo Yii::t('transport','Maximum Capacity');?>
                        </td>
                        <td>
                            <?php echo Yii::t('transport','Insurance');?>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <?php echo $driver->vehicle_no;?>
                        </td>
                        <td>
                            <?php echo $driver->vehicle_code;?>
                        </td>
                        <td>
                            <?php echo $driver->no_of_seats;?>
                        </td>
                        <td>
                            <?php echo $driver->maximum_capacity;?>
                        </td>
                        <td>
                            <?php echo $driver->insurance;?>
                        </td>
                    </tr>
                </table>
            </div></div>
        </td>
    </tr>
</table>