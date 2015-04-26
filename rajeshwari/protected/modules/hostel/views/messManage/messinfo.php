<?php
$this->breadcrumbs=array(
	'Mess Manages'=>array('/hostel'),
	'MessInfo',
);
?>
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'vacate-form',
	'enableAjaxValidation'=>false,
)); ?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="247" valign="top">
    <?php $this->renderPartial('/settings/hostel_left');?>
 </td>
    <td valign="top"> 
    <div class="cont_right">
    <h1><?php echo Yii::t('hostel','Mess Manage');?></h1>
	<?php
		$mess=MessFee::model()->findAll('status=:x AND student_id IS NOT NULL',array(':x'=>'C'));
	
	
	?>
    <div class="pdtab_Con" style="padding:0px;">
		<table width="100%" cellpadding="0" cellspacing="0" border="0" >
			<tr class="pdtab-h">
				<td align="center"><?php echo Yii::t('hostel','Student Name');?></td>
                <td align="center"><?php echo Yii::t('hostel','Hostel');?></td>
				<td align="center"><?php echo Yii::t('hostel','Room No');?></td>
				<td align="center"><?php echo Yii::t('hostel','Bed No');?></td>
				<td align="center"><?php echo Yii::t('hostel','Food Habit' );?></td>
				<td align="center"><?php echo Yii::t('hostel','Amount');?></td>
				<td align="center"><?php echo Yii::t('hostel','Action');?></td>
			</tr>
		<?php
		
			 if($mess!=NULL)
			{
		
				foreach($mess as $mess_1)
				{
					$allot=Allotment::model()->findByAttributes(array('student_id'=>$mess_1->student_id,'status'=>'S'));
					if($allot!=NULL)
					{
						$stud=Students::model()->findByAttributes(array('id'=>$allot->student_id));
						$register=Registration::model()->findByAttributes(array('student_id'=>$allot->student_id));
						if($register!=NULL)
						{
						$food=FoodInfo::model()->findByAttributes(array('id'=>$register->food_preference));
						}
						$floor=Floor::model()->findByAttributes(array('id'=>$allot->floor));
		                $hostel=Hosteldetails::model()->findByAttributes(array('id'=>$floor->hostel_id));

					
	
					
		?>
			<tr>
				<td align="center"><?php if($stud!=NULL)echo $stud->last_name.' '. $stud->first_name;?></td>
                <td align="center"><?php echo $hostel->hostel_name;?></td>
				<td align="center"><?php echo $allot->room_no;?></td>
				<td align="center"><?php echo $allot->bed_no;?></td>
				<td align="center"><?php echo $food->food_preference. ' | '. CHtml::link(Yii::t('hostel','Change'),array('/hostel/Registration/Change','id'=>$allot->student_id));
				?></td>
				<td align="center"><?php echo $food->amount;?></td>
				<td align="center">
	<?php

					if($mess_1->is_paid=='0')
						{
	
							echo CHtml::link(Yii::t('hostel','Pay Fees'),array('/hostel/MessManage/Payfees','id'=>$allot->student_id));
						}
					else
					{
						echo Yii::t('hostel','Paid');	
 					    echo CHtml::link(Yii::t('hostel',' Print Receipt'),array('/hostel/MessManage/print','id'=>$allot->student_id),array('target'=>'_blank')); 
        
					}
					}
		?>
				</td>
			</tr>
		<?php } ?>
			
           
		<?php

		}
		else
		
			{
				 echo '<tr><td align="center" colspan="7"><strong>'.Yii::t('hostel','No data available').'</strong></td></tr>';
				
			}
			
	?>
    </div>
    </td>
    </tr>
    </table></table> </div>
<?php $this->endWidget(); ?>
