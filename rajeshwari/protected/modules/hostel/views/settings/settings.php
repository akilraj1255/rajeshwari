<?php
$this->breadcrumbs=array(
	'Settings'=>array('/hostel'),
	'View',
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
			echo '<div align="center"><strong>'.Yii::t('hostel','Un paid students').'</strong></div>&nbsp;';
			$fee=MessFee::model()->findAll('is_paid=:x AND student_id IS NOT NULL',array(':x'=>'0'));
			
	
		?>
        
        
           <?php
    Yii::app()->clientScript->registerScript(
       'myHideEffect',
       '$(".flash-success").animate({opacity: 1.0}, 3000).fadeOut("slow");',
       CClientScript::POS_READY
    );
?>

<?php if(Yii::app()->user->hasFlash('notification')):?>
    <span class="flash-success" style="color:#F00; padding-left:25px; font-size:12px">
        <?php echo Yii::app()->user->getFlash('notification'); ?>
    </span>
<?php endif; ?>


        <div class="pdtab_Con" style="padding:0px;">
			<table width="100%" cellpadding="0" cellspacing="0" border="0" >
				<tr class="pdtab-h">
					<td align="center"><?php echo Yii::t('hostel','Student Name');?></td>
                    <td align="center"><?php echo Yii::t('hostel','Hostel');?></td>
                     <td align="center"><?php echo Yii::t('hostel','Floor');?></td>
					<td align="center"><?php echo Yii::t('hostel','Room No');?></td>
					<td align="center"><?php echo Yii::t('hostel','Bed No');?></td>
					<td align="center"><?php echo Yii::t('hostel','Food Habit');?></td>
					<td align="center"><?php echo Yii::t('hostel','Action');?></td>
				</tr>
		<?php
		if($fee==NULL)
				{
					echo '<tr><td align="center" colspan="7"><strong>'.Yii::t('hostel','No data available').'</strong></td></tr>';
				}
			else if($fee!=NULL)
				{
				foreach($fee as $fee_1)
				{
					$allot=Allotment::model()->findByAttributes(array('student_id'=>$fee_1->student_id,'status'=>'S'));
					if($allot!=NULL)
					{
						$stud=Students::model()->findByAttributes(array('id'=>$allot->student_id));
						$register=Registration::model()->findByAttributes(array('student_id'=>$allot->student_id));
					}
	
					    $food=FoodInfo::model()->findByAttributes(array('id'=>$register->food_preference));
						$floordetails=Floor::model()->findByAttributes(array('id'=>$allot->floor));
						$hostel=Hosteldetails::model()->findByAttributes(array('id'=>$floordetails->hostel_id));
		?>
			<tr>
				<td align="center"><?php echo $stud->last_name.' '. $stud->first_name;?></td>
                <td align="center">   <?php echo $hostel->hostel_name; ?></td>
                <td align="center"><?php echo $floordetails->floor_no;?></td>
				<td align="center"><?php if($allot!=null) { echo $allot->room_no; } ?></td>
				<td align="center"><?php if($allot!=null) { echo $allot->bed_no; } ?></td>
				<td align="center"><?php if($allot!=null) { echo $food->food_preference; } ?></td>
			<td align="center"><?php 
					echo Yii::t('hostel','Un paid').'['.CHtml::link(Yii::t('hostel','Send Mail'),array('/hostel/Settings/remind/','id'=>$fee_1->student_id,'flag'=>1),array('confirm'=>'You want to send mail to '.$stud->first_name.'?')).']';
			?></td>
		</tr>
		<?php 
		}
		?>
		</table>
        </div>
		<?php
	}

?>
</div>
</td>
</tr>
</table>