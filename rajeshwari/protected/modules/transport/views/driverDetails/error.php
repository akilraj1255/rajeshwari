<?php
$this->breadcrumbs=array(
	'Driver Details'=>array('/transport'),
	'Error',
);

?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="247" valign="top">
    <?php $this->renderPartial('/transportation/trans_left');?>
 </td>
    <td valign="top"> 
    <div class="cont_right">
<h1>DriverDetails</h1>
<?php
echo Yii::t('transport','Please enter the required information about the driver').'&nbsp;&nbsp;';
echo  CHtml::link(Yii::t('transport','Click Here'),array('/transport/DriverDetails/create/'));
?>
</div>
</td>
</tr>
</table>