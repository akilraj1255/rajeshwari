<?php
$this->breadcrumbs=array(
	'Settings'=>array('/hostel'),
	$model->name,
);

?>

<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="247" valign="top">
    <?php $this->renderPartial('/settings/hostel_left');?>
 </td>
    <td valign="top"> 
    <div class="cont_right">
      <div class="yellow_bx" style="background-image:none;width:90%;padding-bottom:45px;">
                    <div class="y_bx_head" style="width:90%">
    <h1><?php echo Yii::t('hostel','Notifications');?></h1>
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
	<?php
			
			$request=Roomrequest::model()->findAll('status=:x order by created_at DESC  limit 1',array(':x'=>'C'));
			
			if($request!=NULL)
			{
				$i=1;
				foreach($request as $request_1)
				{
					echo '<tr>';
					$student=Students::model()->findByAttributes(array('id'=>$request_1->student_id));
					$reg= Registration::model()->findByAttributes(array('student_id'=>$request_1->student_id));
					if($request_1->allot_id!=NULL)
					{
						
						$allot=Allotment::model()->findByAttributes(array('id'=>$request_1->allot_id));
						if($student!=NULL)
						{
							echo '<td align="center">'.$i.'</td>';
							echo '<td align="center"><strong>'.ucfirst($student->last_name.' '.$student->first_name).'</td>';
							echo '<td align="center">'.$i.'</td>';
							echo '<td align="center">'.$i.'</td>';
						echo $i.'&nbsp;<strong>'.ucfirst($student->first_name.' '.$student->last_name).'&nbsp;has been requested for changing room to'.' '.$allot->room_no.'&nbsp;'.$allot->bed_no.' '.'</strong>[&nbsp;'.CHtml::link(Yii::t('hostel','Allot'),array('/hostel/allotment/create','studentid'=>$request_1->student_id,'allotid'=>$request_1->allot_id)).'&nbsp;]<br>' ;
						$i++;
						}
					}
					else if($request_1->allot_id==NULL)
					{
						$i=1;
						if($student!=NULL)
						{
						echo $i.'&nbsp;<strong>'.ucfirst($student->first_name.' '.$student->last_name).'&nbsp;has been applied for hostel facility</strong>&nbsp;'.CHtml::link(Yii::t('hostel','Register'),array('/hostel/registration/update','studentid'=>$request_1->student_id,'id'=>$reg->id)) ;
					$i++;
						}
					}
				
			}
			echo '</tr>';
			}
			else
			{
				echo '<strong>'.Yii::t('hostel','No notifications').'</strong>';
			}
	
		?>
      
		<?php
	

?>
</table>
</div>
</div>
</div>
</td>
</tr>
</table>