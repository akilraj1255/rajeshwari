<?php
$this->breadcrumbs=array(
	'Books',
);
?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="247" valign="top">
    
    <?php $this->renderPartial('/settings/library_left');?>
    
    </td>
    <td valign="top">
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td valign="top" width="75%">
        <div class="cont_right">
<h1><?php echo Yii::t('library','Library Dashboard');?></h1>
<?php
$due=BorrowBook::model()->findAll('due_date=:x',array(':x'=>date('Y-m-d')));
$return=ReturnBook::model()->findAll('return_date=:x',array(':x'=>date('Y-m-d')));
$borrow=BorrowBook::model()->findAll('issue_date=:x',array(':x'=>date('Y-m-d')));
?>
<div class="overview">
	<div class="overviewbox ovbox1">
    	<h1><strong><?php echo Yii::t('library','Due Today');?></strong></h1>
        <div class="ovrBtm"><?php echo count($due);?></div>
    </div>
    <div class="overviewbox ovbox2">
    	<h1><strong><?php echo Yii::t('library','Returned Today');?></strong></h1>
        <div class="ovrBtm"><?php echo count($return);?></div>
    </div>
    <div class="overviewbox ovbox3">
    	<h1><strong><?php echo Yii::t('library','Borrowed Today');?></strong></h1>
        <div class="ovrBtm"><?php echo count($borrow);?></div>
    </div>
  <div class="clear"></div>
    
</div>
<?php
$bookdetails=Book::model()->findAll();

?>
<div class="pdtab_Con">
<div style="font-size:13px; padding:5px 0px"><strong><?php echo Yii::t('library','Recent Books');?></strong></div>
<table width="100%" cellpadding="0" cellspacing="0" border="0">
<tbody><tr class="pdtab-h">
<td align="center"><?php echo Yii::t('library','ISBN');?></td>
<td align="center"><?php echo Yii::t('library','Book Name');?></td>
<td align="center"><?php echo Yii::t('library','Author');?></td>
<td align="center"><?php echo Yii::t('library','Edition');?></td>
<td align="center"><?php echo Yii::t('library','Publisher');?></td>
<td align="center"><?php echo Yii::t('library','Copies Available');?></td>
</tr>
<?php 

if($bookdetails!=NULL)
{



foreach($bookdetails as $book)
{
	$author=Author::model()->findByAttributes(array('auth_id'=>$book->author));
	$publication=Publication::model()->findByAttributes(array('publication_id'=>$book->publisher));
	?>
<tr>

<td align="center"><?php echo $book->isbn;?></td>
<td align="center"><?php echo $book->title;?></td>
<td align="center"><?php 
if($author!=NULL)
{
echo CHtml::link(ucfirst($author->author_name), array('/library/authors/authordetails','id'=>$author->auth_id));
}
else
{
	echo '-';
}?></td>
<td align="center"><?php echo $book->edition;?></td>
<td align="center"><?php 
if($publication!=NULL)
{
echo $publication->name;
}
else
{
	echo '-';
}?></td>
<td align="center"><?php echo $book->copy;?></td>

</tr>
<?php }
				} 
				else
				{
					echo '<tr><td align="center" colspan="6"><strong>'.Yii::t('library','No data available').'</strong></td></tr>';
				}
				 ?>





</tbody></table>
</div>

<br />

<div class="pdtab_Con" style="padding:0px;">
<div style="font-size:13px; padding:5px 0px"><strong><?php echo Yii::t('library','Due Today');?></strong></div>
 <table width="100%" cellpadding="0" cellspacing="0" border="0">
<tbody><tr class="pdtab-h">
<td align="center"><?php echo Yii::t('library','Student Name');?></td>
<td align="center"><?php echo Yii::t('library','ISBN');?></td>
<td align="center"><?php echo Yii::t('library','Book Name');?></td>
<td align="center"><?php echo Yii::t('library','Author');?></td>
<td align="center"><?php echo Yii::t('library','Issue Date');?></td>
<td align="center"><?php echo Yii::t('library','Action');?></td>
</tr>
<?php
if($due!=NULL)
{
	foreach($due as $due_1)
	{
		$student=Students::model()->findByAttributes(array('id'=>$due_1->student_id));
		$book=Book::model()->findByAttributes(array('id'=>$due_1->book_id));
		$author=Author::model()->findByAttributes(array('auth_id'=>$book->author));
?>
<tr>

<td align="center"><?php echo ucfirst($student->last_name.''.$student->first_name);?></td>
<td align="center"><?php echo $book->isbn;?></td>
<td align="center"><?php echo $book->title;?></td>
<td align="center">
<?php 
echo CHtml::link(ucfirst($author->author_name), array('/library/authors/authordetails','id'=>$author->auth_id));
?>
</td>
<td align="center">

<?php
								$settings=UserSettings::model()->findByAttributes(array('user_id'=>Yii::app()->user->id));
								if($settings!=NULL)
								{	
									$date1=date($settings->displaydate,strtotime($due_1->issue_date));
									echo $date1;
		
								}
?>
</td>
<?php /*?><td align="center">
<?php echo CHtml::link('Send Message',array('library/borrowbook/remind/','id'=>$due_1->student_id,'due'=>$_REQUEST['id']),array('confirm'=>'You want to send mail to  '.$student->first_name.'?'));?>
  <a href="#">Send Message</a></td><?php */?>
</tr>
<?php }
 }
 else
 {
	 echo '<tr><td align="center" colspan="6"><strong>'.Yii::t('library','No dues').'</strong></td></tr>';
 }
 ?>

</tbody></table>
</div>
<div class="clear"></div>
</div>
		</td>
       </tr>
     </table>
    </td>
   </tr>
</table>