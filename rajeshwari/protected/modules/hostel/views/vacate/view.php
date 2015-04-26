<?php
$this->breadcrumbs=array(
	'Vacates'=>array('index'),
	$model->id,
);

?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="247" valign="top">
    <?php $this->renderPartial('/settings/hostel_left');?>
 </td>
    <td valign="top">
    <div style="padding-left:10px;"> 
    <h1><?php echo Yii::t('hostel','Vacate');?></h1>
    <div class="cont_right">    
     <?php
	$student=Students::model()->findByAttributes(array('id'=>$model->student_id));?>
	     <div class="pdtab_Con">
    <table width="100%" cellpadding="0" cellspacing="0" border="0" >
<tr class="pdtab-h" height="32px">
<th align="center"><?php echo Yii::t('library','Student');?></th>
<th align="center"><?php echo Yii::t('library','Room No');?></th>
<th align="center"><?php echo Yii::t('library','Vacate Date');?></th>
</tr>
<tr>
<td align="center"><?php echo $student->last_name.' '.$student->first_name;?></td>
<td align="center"><?php echo $model->room_no;?></td>
<td align="center"><?php 
$settings=UserSettings::model()->findByAttributes(array('user_id'=>Yii::app()->user->id));
								if($settings!=NULL)
								{	
									$date1=date($settings->displaydate,strtotime($model->vacate_date));
									echo $date1;
		
								}?></td>
</tr>
</table>
</div>

</div>
</div>
</td>
</tr>
</table>
