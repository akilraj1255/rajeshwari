<?php
$this->breadcrumbs=array(
	'Mess Manages'=>array('/hostel'),
	'MessDetails',
);
?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="247" valign="top">
    <?php $this->renderPartial('/settings/hostel_left');?>
 </td>
    <td valign="top"> 
    <div class="cont_right">
    <h1><?php echo Yii::t('hostel','Student Details');?></h1>
<?php
	$allot=Allotment::model()->findByAttributes(array('student_id'=>$studentid,'status'=>'S'));
	if($allot!=NULL)
	{
		$stud=Students::model()->findByAttributes(array('id'=>$allot->student_id));
		$register=Registration::model()->findByAttributes(array('student_id'=>$allot->student_id));
		$food=FoodInfo::model()->findByAttributes(array('id'=>$register->food_preference));
		$mess=MessFee::model()->findByAttributes(array('student_id'=>$allot->student_id));
		$floor=Floor::model()->findByAttributes(array('id'=>$allot->floor));
		$hostel=Hosteldetails::model()->findByAttributes(array('id'=>$floor->hostel_id));


	?>
    <div class="pdtab_Con" style="padding:0px;">
		<table width="100%" cellpadding="0" cellspacing="0" border="0" >
		<tr class="pdtab-h">
			<td align="center"><?php echo Yii::t('hostel','Student Name');?></td>
            <td align="center"><?php echo Yii::t('hostel','Hostel');?></td>
		    <td align="center"><?php echo Yii::t('hostel','Room No');?></td>
			<td align="center"><?php echo Yii::t('hostel','Bed No');?></td>
			<td align="center"><?php echo Yii::t('hostel','Food Habit');?></td>
			<td align="center"><?php echo Yii::t('hostel','Amount');?></td>
			<td align="center"><?php echo Yii::t('hostel','Action');?></td>
		</tr>
		<tr>
			<td align="center"><?php echo $stud->last_name.' '. $stud->first_name;?></td>
            <td align="center"><?php echo $hostel->hostel_name;?></td>
			<td align="center"><?php echo $allot->room_no;?></td>
			<td align="center"><?php echo $allot->bed_no;?></td>
			<td align="center"><?php echo $food->food_preference;?></td>
			<td align="center"><?php echo $food->amount;?></td>
			<td align="center"><?php 
 //foreach($list as $list_1) { 
 					if($mess->is_paid == 0)
					 echo CHtml::link(Yii::t('hostel','Pay Fees'),array('/hostel/MessManage/Payfees','id'=>$allot->student_id),array('confirm'=>'Are you sure?'));
					 else
					echo Yii::t('hostel',' Paid');
			?></td>

		</tr>
		</table>
        </div>
	<?php
// }
	 }
	else
	{
		echo 'Sorry!!&nbsp;Data is unavailable';
	}?>
	</div>
    </td>
    </tr>
    </table>