<style>
.formConInner{width:auto;}
</style>

<?php
$this->breadcrumbs=array(
	'Allotments'=>array('/hostel'),
	$model->id,
);

?>

<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="247" valign="top">
    <?php $this->renderPartial('/settings/hostel_left');?>
 </td>
    <td valign="top"> 
    <div class="cont_right">
    <h1><?php echo Yii::t('hostel','View Details');?></h1>
 <div class="formCon" >
<div class="formConInner">
<?php
$allot=Allotment::model()->findByAttributes(array('id'=>$_REQUEST['id']));
$floor=Floor::model()->findByAttributes(array('id'=>$allot->floor));
$student=Students::model()->findByAttributes(array('id'=>$allot->student_id));
$hostel=Hosteldetails::model()->findByAttributes(array('id'=>$floor->hostel_id));
?>
 <div class="pdtab_Con" style="padding-top:0px;">
                             <table width="100%" cellpadding="0" cellspacing="0" border="0" >
							<tr class="pdtab-h">
								<td align="center"><?php echo Yii::t('hostel','Student Name');?></td>
								<td align="center"><?php echo Yii::t('hostel','Admission Date');?></td>
                                <td align="center"><?php echo Yii::t('hostel','Hostel');?></td>
                                 <td align="center"><?php echo Yii::t('hostel','Floor');?></td>
								<td align="center"><?php echo Yii::t('hostel','Room');?></td>
								<td align="center"><?php echo Yii::t('hostel','Bed');?></td>

							</tr>
                            <tr>
                           <td align="center"><?php echo $student->last_name.' '.$student->first_name;?></td>
                            <td align="center"><?php 
												$settings=UserSettings::model()->findByAttributes(array('user_id'=>Yii::app()->user->id));
								if($settings!=NULL)
								{	
									$date1=date($settings->displaydate,strtotime($allot->created));
									
		
								}
											echo $date1;?></td>
                           <td align="center"><?php echo $hostel->hostel_name;?></td>
                           <td align="center"><?php echo $floor->floor_no;?></td>
                           <td align="center"><?php echo $allot->room_no;?></td>
                            <td align="center"><?php echo $allot->bed_no;?></td>
                            </tr>
                            </table>
                            </div>
</div>
</div>
</div>
</td>
</tr>
</table>