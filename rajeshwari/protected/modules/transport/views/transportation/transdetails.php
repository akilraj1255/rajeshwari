<?php $this->breadcrumbs=array(
	'Transportations'=>array('/transport'),
	'TransDetails'
	
);?>

<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="247" valign="top">
    <?php $this->renderPartial('/transportation/trans_left');?>
 </td>
    <td valign="top"> 
    <div class="cont_right">
    <h1><?php echo Yii::t('transport','Student Details');?></h1>
 <?php
	$list=Transportation::model()->findByAttributes(array('student_id'=>$studentid));
	if($list!=NULL)
	{
		$student=Students::model()->findByAttributes(array('id'=>$studentid));
	    $stop=StopDetails::model()->findByAttributes(array('id'=>$list->stop_id));
	    $route=RouteDetails::model()->findByAttributes(array('id'=>$stop->route_id));
	?>
    <div class="pdtab_Con" style="padding:0px;">
		<table width="100%" cellpadding="0" cellspacing="0" border="0" >
		<tr class="pdtab-h">
			<td align="center"><?php echo Yii::t('transport','Student Name');?></td>
			<td align="center"><?php echo Yii::t('transport','Route');?></td>
			<td align="center"><?php echo Yii::t('transport','Stop');?></td>
			<td align="center"><?php echo Yii::t('transport','Fare');?></td>
			<td align="center"><?php echo Yii::t('transport','Action');?></td>
			
		</tr>
		<tr>
			<td align="center"><?php echo $student->last_name.' '. $student->first_name;?></td>
			<td align="center"><?php echo $route->route_name;?></td>
			<td align="center"><?php echo $stop->stop_name;?></td>
			<td align="center"><?php echo $stop->fare;?></td>
			<td align="center"><?php 
 //foreach($list as $list_1) { 
 					if($list->is_paid == 0)
					 echo CHtml::link(Yii::t('transport','Pay Fees'),array('/hostel/MessManage/Payfees','id'=>$allot->student_id));
					 else
					echo Yii::t('transport',' Paid');
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
     