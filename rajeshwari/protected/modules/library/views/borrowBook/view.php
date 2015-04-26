<?php
$this->breadcrumbs=array(
	'Borrow Books'=>array('/library'),
	$model->id,
);

?>

<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="247" valign="top">

 <?php $this->renderPartial('/settings/library_left');?>
 </td>
    <td valign="top">
     <div class="cont_right formWrapper">
<h1><?php echo Yii::t('library','Book Details');?></h1>

<?php $student=Students::model()->findByAttributes(array('id'=>$model->student_id));?>
<div class="pdtab_Con">
 <table width="100%" border="0" cellspacing="0" cellpadding="0">
 <tr class="pdtab-h">
 <td align="center"><?php echo Yii::t('library','Student Name');?></td>
 <td align="center"><?php echo Yii::t('library','Book');?></td>
 <td align="center"><?php echo Yii::t('library','Issued Date');?></td>
 <td align="center"><?php echo Yii::t('library','Due date');?></td>
 </tr>
 <tr>
 <td align="center"><?php echo $student->last_name.' '.$student->first_name;?></td>
 <td align="center"><?php echo $model->book_name;?></td>
 <td align="center"><?php 
 							$settings=UserSettings::model()->findByAttributes(array('user_id'=>Yii::app()->user->id));
								if($settings!=NULL)
								{	
									$date1=date($settings->displaydate,strtotime($model->issue_date));
									echo $date1;
		
								}
								
								
 						?></td>
 <td align="center"><?php 		
 								if($settings!=NULL)
								{	
									$date2=date($settings->displaydate,strtotime($model->due_date));
									echo $date2;
		
								}
								
 								?></td>
 		</tr>
 	</table>
 	</div>
 	</div>
 </td>
 </tr>
 </table>