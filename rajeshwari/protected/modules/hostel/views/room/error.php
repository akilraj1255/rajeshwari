<?php
$this->breadcrumbs=array(
	'Rooms'=>array('/hostel'),
	'Manage',
);
?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="247" valign="top">
    <?php $this->renderPartial('/settings/hostel_left');?>
 </td>
    <td valign="top"> 
    <div class="cont_right">
<?php
 echo '<strong>'.Yii::t('hostel','Sorry!!&nbsp;There is no space in this room.').'</strong>&nbsp;';
 echo '<strong>'.Yii::t('hostel','Click Here to enter the').' </strong> &nbsp;&nbsp;'. CHtml::link(Yii::t('hostel','Room details'),array('/Room/create'));
 
 ?>
 </div>
 </td>
 </tr>
 </table>