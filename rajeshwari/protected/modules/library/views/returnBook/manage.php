<?php
$this->breadcrumbs=array(
	'Borrow Books'=>array('/library'),
	'StudentDetails',
);?>
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'borrow-book-form',
	'enableAjaxValidation'=>false,
)); ?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="247" valign="top">
    <?php $this->renderPartial('/settings/library_left');?>
 </td>
  <td>
  </td>
    <td valign="top">
     <div class="cont_right">  
     <h1><?php echo Yii::t('library','Return Book Details');?></h1>
     <div class="formCon">
    <div class="formConInner">
    <?php

echo '<strong>'.Yii::t('library','Student Admission No ').'</strong>';
 $data = Students::model()->findAll(array(
'join' => 'JOIN borrow_book ON t.id 	 = borrow_book.student_id',
    'condition' => 'borrow_book.status =:x',
	'distinct'=>true,
	'params' => array(':x'=>'C'),
)) ;

echo CHtml::dropDownList('BookID','',CHtml::listData($data,'id','admission_no'),array('prompt'=>'Select','options'=>array($_REQUEST['id']=>array('selected'=>true)),'id'=>'book_id','submit'=>array('/library/ReturnBook/manage')));

?>
<?php 
                     
                        if(isset($_REQUEST['id']))
						{
							$book=BorrowBook::model()->findAll('student_id=:t2',array(':t2'=>$_REQUEST['id']));
							$student=Students::model()->findByAttributes(array('id'=>$_REQUEST['id']));
							
							
								
								
								
						?>
                        </div>
                        </div>
                        <div class="pdtab_Con" style="padding:0px;">
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
              if($book!=NULL)
			{
           foreach($book as $book_1)

	{
	
	$bookdetails=Book::model()->findByAttributes(array('id'=>$book_1->book_id));
	$author=Author::model()->findByAttributes(array('auth_id'=>$bookdetails->author));
	$publication=Publication::model()->findByAttributes(array('publication_id'=>$bookdetails->publisher));
	?>
<tr>

<td align="center"><?php echo $student->last_name.' '.$student->first_name;?></td>
<td align="center"><?php echo $bookdetails->isbn;?></td>
<td align="center"><?php echo $bookdetails->title;?></td>
<td align="center"><?php 
if($author!=NULL)
{
echo CHtml::link($author->author_name,array('/library/authors/authordetails','id'=>$author->auth_id));
}
?></td>
<td align="center"><?php 
						$settings=UserSettings::model()->findByAttributes(array('user_id'=>Yii::app()->user->id));
								if($settings!=NULL)
								{	
									$date1=date($settings->displaydate,strtotime($book_1->issue_date));
									echo $date1;
		
								}
								else
								echo $book_1->issue_date;
							?></td>
<td align="center"><?php 
							if($settings!=NULL)
								{	
									$date1=date($settings->displaydate,strtotime($book_1->due_date));
									echo $date1;
		
								}
								else
								echo $book_1->due_date;
							?></td>
<td align="center">
<?php 
if($book_1->status=='R')
{
	echo 'Yes';
}
else
{
	echo CHtml::link('Return Book',array('/library/ReturnBook/create','id'=>$book_1->student_id),array('confirm'=>'Are you sure?'));
}
?>
</td>
</tr>
<?php }
				} 
				else
				{
					echo '<tr><td align="center" colspan="7">'.Yii::t('library','No data available').'</td></tr>';
				}
				 ?>
</table>
</div>
</div>
</td>
</tr>
</table>
<?php } ?>
<?php $this->endWidget(); ?>