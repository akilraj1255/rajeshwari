<?php $this->breadcrumbs=array(
	'Transportations'=>array('/transport'),
	$model->id=>array('view','id'=>$model->id),
	
);?>


<table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
        <td width="247" valign="top">
            <?php $this->renderPartial('/transportation/trans_left');?>
        </td>
        <td valign="top">
            <div class="cont_right">
                <h1>
                    <?php echo Yii::t('transport','Transportation');?>
                </h1>
                <div class="pdtab_Con">
                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                        <tr class="pdtab-h">
                            <td align="center">
                                <?php echo Yii::t('transport','Student Name');?>
                            </td>
                            <td align="center">
                                <?php echo Yii::t('transport','Route');?>
                            </td>
                            <td align="center">
                                <?php echo Yii::t('transport','Stop');?>
                            </td>
                            <td align="center">
                                <?php echo Yii::t('transport','Fare');?>
                            </td>
                            
                        </tr>
                        <tr>
                            <?php $student=Students::model()->findByAttributes(array('id'=>$model->student_id));
 $stop=StopDetails::model()->findByAttributes(array('id'=>$model->stop_id));
 $route=RouteDetails::model()->findByAttributes(array('id'=>$stop->route_id));
 ?>
                            <td align="center">
                                <?php echo $student->last_name.' '.$student->first_name;?>
                            </td>
                            <td align="center">
                                <?php echo $route->route_name;?>
                            </td>
                            <td align="center">
                                <?php echo $stop->stop_name;?>
                            </td>
                            <td align="center">
                                <?php echo $stop->fare;?>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </td>
    </tr>
</table>



