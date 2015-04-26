
<script language="javascript">
function booklist()
{
	var val=document.getElementById('id').value;
	window.location = "index.php?r=Settings/index&id="+val;
}

</script>

<?php
$this->breadcrumbs=array(
	'Settings'=>array('/library'),
	'Create',
);


//$this->menu=array(
//	array('label'=>'Create Settings', 'url'=>array('create')),
//	array('label'=>'Manage Settings', 'url'=>array('admin')),
//);
?>

<h1>Settings</h1>

 <?php  ?>
<?php 
echo Yii::t('library','<strong>Select daterange</strong>').'&nbsp;';
//echo CHtml::dropDownList('',isset($_REQUEST['id'])? $_REQUEST['id'] : '',CHtml::listData(Students::model()->findAll(),'id','first_name'),
				//array('prompt'=>'select', 'onchange'=>"javascript:booklist();", 'id'=>'id')); 
	echo CHtml::activeDropDownList($model,'due_date',array('1' => '1', '2' => '5', '3' => '10'),array('prompt'=>'Option','onchange'=>"javascript:booklist();",'id'=>'id'));			
				?>
<?php 
if(isset($_REQUEST['id']) && ($_REQUEST['id']!=NULL))
{
	if($_REQUEST['id']==1)
	{
		$currdate=date('Y-m-d');
		$targetdate=date('Y-m-d', strtotime('+1 day',strtotime($currdate)));
		echo $targetdate;

		
	}
	if($_REQUEST['id']==2)
	{
		$currdate=date('Y-m-d');
		$targetdate=date('Y-m-d', strtotime('+5 day',strtotime($currdate)));
		echo $targetdate;

		
	}
	if($_REQUEST['id']==3)
	{
		$currdate=date('Y-m-d');
		$targetdate=date('Y-m-d', strtotime('+10 day',strtotime($currdate)));
		echo $targetdate;

		
	}
	$duedate=BorrowBook::model()->findAll('due_date=:x AND status=:y',array(':x'=>$targetdate,':y'=>'C'));
	
		?>
         <table width="100%" cellpadding="0" cellspacing="0" border="0" style="padding:10px; width:100%;">
<tr>
<td><?php echo Yii::t('library','Student Name');?></td>
<td><?php echo Yii::t('library','ISBN');?></td>
<td><?php echo Yii::t('library','Book Name');?></td>
<td><?php echo Yii::t('library','Author');?></td>
<td><?php echo Yii::t('library','Issue Date');?></td>
<td><?php echo Yii::t('library','Due Date');?></td>
<td><?php echo Yii::t('library','Is returned');?></td>
</tr>
        <?php
		foreach($duedate as $due)
	{
		$bookdetails=Book::model()->findByAttributes(array('id'=>$due->book_id));
		$student=Students::model()->findByAttributes(array('id'=>$due->student_id));
		?>
        <tr>

<td><?php echo $student->first_name.' '.$student->last_name;?></td>
<td><?php echo $bookdetails->isbn;?></td>
<td><?php echo $bookdetails->title;?></td>
<td><?php echo $bookdetails->author;?></td>
<td><?php $settings=UserSettings::model()->findByAttributes(array('user_id'=>Yii::app()->user->id));
								if($settings!=NULL)
								{	
									$date1=date($settings->displaydate,strtotime($due->issue_date));
									
		
								}
								echo $date1;?></td>
<td><?php 
			$settings=UserSettings::model()->findByAttributes(array('user_id'=>Yii::app()->user->id));
								if($settings!=NULL)
								{	
									$date2=date($settings->displaydate,strtotime($due->due_date));
									
		
								}
		echo $date2;?></td>
<td>
<?php 
if($due->status=='R')
{
	echo 'Yes';
}
else
{
	echo 'No';
}
?>
</td>
</tr>
        <?php
		
	}
	
}
?>