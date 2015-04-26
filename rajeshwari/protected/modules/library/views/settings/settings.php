<?php
$this->breadcrumbs=array(
	'Settings'=>array('/library'),
	'Settings',
);?>
<script language="javascript">
function booklist()
{
	var val=document.getElementById('id').value;
	window.location = "index.php?r=library/settings/settings&id="+val;
}


</script>
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'borrow-book-form',
	'enableAjaxValidation'=>false,
 )); ?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="247" valign="top">

  <?php $this->renderPartial('/settings/library_left');?>
 </td>
    <td valign="top">
    <div class="cont_right formWrapper">
    <?php
		if(isset($_REQUEST['id']) && ($_REQUEST['id']!=NULL))
		{
			$sel= $_REQUEST['id'];
		}
		else
		{
			$sel='';
		}		
	?>

<h1><?php echo Yii::t('library','Library Management');?></h1>


<div class="formCon" >
    <div class="formConInner">   
<?php echo Yii::t('library','<strong>Students whose due date will expire within</strong>').'&nbsp;';
echo CHtml::activeDropDownList($model,'due_date',array('0' => 'All Dues', '1' => '1 day', '2' => '5 days', '3' => '10 days', '-1' =>'Expired'),array('prompt'=>'Select','onchange'=>"javascript:booklist();",'id'=>'id','options'=>array($sel=>array('selected'=>true))));
echo '</div></div>';
	?>
    
    <?php
    Yii::app()->clientScript->registerScript(
       'myHideEffect',
       '$(".flash-success").animate({opacity: 1.0}, 3000).fadeOut("slow");',
       CClientScript::POS_READY
    );
?>

<?php if(Yii::app()->user->hasFlash('notification')):?>
    <span class="flash-success" style="color:#F00; padding-left:15px; font-size:12px">
        <?php echo Yii::app()->user->getFlash('notification'); ?>
    </span>
<?php endif; ?>

    
    
  <?php                   
  if(isset($_REQUEST['id']) && ($_REQUEST['id']!=NULL))
	{
	$targetdate=0;
	if($_REQUEST['id']==0)
	{
		$currdate=date('Y-m-d');
		$_REQUEST['id']=0;
		
	}
	
				
	if($_REQUEST['id']==1)
	{
		$currdate=date('Y-m-d');
		$targetdate=date('Y-m-d', strtotime('+1 day',strtotime($currdate)));
		$_REQUEST['id']=1;
		
	}
	if($_REQUEST['id']==2)
	{
		$currdate=date('Y-m-d');
		$targetdate=date('Y-m-d', strtotime('+5 day',strtotime($currdate)));
		$_REQUEST['id']=5;
		
	}
	if($_REQUEST['id']==3)
	{
		$currdate=date('Y-m-d');
		$targetdate=date('Y-m-d', strtotime('+10 day',strtotime($currdate)));
		$_REQUEST['id']=10;
		
	}
	
	if($_REQUEST['id']==-1)
	{
		$currdate=date('Y-m-d');
		//$targetdate=date('Y-m-d', strtotime('+10 day',strtotime($currdate)));
		$_REQUEST['id']=-1;
		
	}
	
	// Customising the table
	if($_REQUEST['id']==0){
		
		$duedate=BorrowBook::model()->findAll('status=:x',array(':x'=>'C'));
	}
	elseif($_REQUEST['id']==-1){
		
		$duedate=BorrowBook::model()->findAll('due_date < CURRENT_DATE() AND status=:y',array(':y'=>'C'));
	}
	else{
		$duedate=BorrowBook::model()->findAll('due_date=:x AND status=:y',array(':x'=>$targetdate,':y'=>'C'));
	}
						
						
								
						?>
    <div class="pdtab_Con">                
      <table width="100%" cellpadding="0" cellspacing="0" border="0" >
        <tr class="pdtab-h">
        <td align="center"><?php echo Yii::t('library','Student Name');?></td>
        <td align="center"><?php echo Yii::t('library','ISBN');?></td>
        <td align="center"><?php echo Yii::t('library','Book Name');?></td>
        <td align="center"><?php echo Yii::t('library','Author');?></td>
        <td align="center"><?php echo Yii::t('library','Issue Date');?></td>
        <td align="center"><?php echo Yii::t('library','Due Date');?></td>
        <td align="center"><?php echo Yii::t('library','Is returned');?></td>
        </tr>
<?php 
if($duedate==NULL)
	{
		echo '<tr><td align="center" colspan="7"><strong>'.Yii::t('library','No data available now.').'</strong></td></tr>';
	}
	else
	{	
		// Button to send SMS 
		$sms_settings=SmsSettings::model()->findAll();
		if($sms_settings[0]->is_enabled=='1' and $sms_settings[8]->is_enabled=='1'){ // Checking if SMS is enabled ?>
			<div class="edit_bttns" style="top:73px; right:40px;"> 
				<?php echo CHtml::button('Send Reminder SMS', array('submit' => array('Settings/Sendsms','due_date_id'=>$_REQUEST['id'],'target_date'=>$targetdate),'class'=>'formbut')); ?>
			</div>
	<?php	}
		foreach($duedate as $due)
		{
		$bookdetails=Book::model()->findByAttributes(array('id'=>$due->book_id));
		$student=Students::model()->findByAttributes(array('id'=>$due->student_id));
	?>
<tr>

<td align="center"><?php echo $student->last_name.' '.$student->first_name;?></td>
<td align="center"><?php echo $bookdetails->isbn;?></td>
<td align="center"><?php echo $bookdetails->title;?></td>
<td align="center"><?php echo $bookdetails->author;?></td>
<td align="center"><?php 	

							$settings=UserSettings::model()->findByAttributes(array('user_id'=>Yii::app()->user->id));
								if($settings!=NULL)
								{	
									$date1=date($settings->displaydate,strtotime($due->issue_date));
									echo $date1;
									
		
								}
								else
								echo $due->issue_date;
								?></td>
<td align="center"><?php 
						if($settings!=NULL)
								{	
									$date1=date($settings->displaydate,strtotime($due->due_date));
									echo $date1;
									
		
								}
								else
								echo $due->due_date;
						?></td>
<td align="center">
<?php 
if($due->status=='R')
{
	echo 'Yes';
}
else
{
	 echo 'No';
	 // echo 'No'.'['.CHtml::link(Yii::t('library','Send Mail'),array('library/settings/remind/','id'=>$due->student_id,'due'=>$_REQUEST['id']),array('confirm'=>'You want to send mail to  '.$student->first_name.'?')).']';
}
?>
</td>
</tr>
<?php }
				} 
				
				 ?>
</table>
<?php } ?>
<?php $this->endWidget(); ?>
</div>
</div>
</div>
</div>
    </td>
  </tr>
</table>