
<?php
$this->breadcrumbs=array(
	'Allotments'=>array('/hostel'),
	'RoomInfo',
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
			 echo '<strong>'.Yii::t('hostel','Sorry!&nbsp;No rooms are  available now.').'</strong>&nbsp;';
			// echo '<strong>'.Yii::t('hostel','Click here to view the ').'</strong> &nbsp;&nbsp;'. CHtml::link(Yii::t('hostel','Room details'),array('RoomDetails/manage'));
			  echo '<strong>'.Yii::t('hostel','Click here to view the ').'</strong> &nbsp;&nbsp;'. CHtml::link(Yii::t('hostel','Room details'),array('Room/manage'));
			 
			 ?>
            </div>
        </td>
    </tr>
</table>