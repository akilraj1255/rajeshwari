<?php
$this->breadcrumbs=array(
	'Books'=>array('/library'),
	'BookSearch',
);?>

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'book-form',
	'enableAjaxValidation'=>false,
)); ?>


<?php 
     $roles=Rights::getAssignedRoles(Yii::app()->user->Id); // check for single role
					
						  foreach($roles as $role)
						  
						   if(sizeof($roles)==1 and $role->name == 'student')
						   { ?>
                           <div id="parent_Sect">
    <?php $this->renderPartial('/settings/studentleft');?>
    
    <div id="parent_rightSect">
        	<div class="parentright_innercon">
            	<h1>Book List</h1>
                <div class="profile_details">
        	<div class="form_wrapper " >
    <div class="formConInner">
    <table width="90%" border="0" cellspacing="0" cellpadding="0">
  <tr>
 
    <td align="right" style="padding-right:5px;">
 

<?php
echo CHtml::label(Yii::t('library','Search Book by'),'').'</td><td style="padding-right:10px;">'; 
echo CHtml::dropDownList('search','',array('1'=>'subjects','2'=>'title','3'=>'author','4'=>'isbn'),array('prompt'=>'Select','id'=>'search_id')).'</td><td>';
echo CHtml::textField('text','');

				
				
?>

<input type="submit" value="search" class="formbut" />
</td>
 </tr>
</table>
</div>
</div>
<?php

if(isset($list))
{
	 if($list==NULL)
		{
			echo '<div align="center">'.Yii::t('library','<strong>OOPS!!&nbsp;Its an invalid search.Try again..</strong>').'</div>';
		}
		else
		{
	
	?>
    
    <div class="pdtab_Con" style="padding-top:10px;">
     <table width="100%" cellpadding="0" cellspacing="0" border="0" >
<tr class="pdtab-h">
<th align="center"><?php echo Yii::t('library','Subject');?></th>
<th align="center"><?php echo Yii::t('library','Book Title');?></th>
<th align="center"><?php echo Yii::t('library','ISBN');?></th>
<th align="center"><?php echo Yii::t('library','Author');?></th>
<th align="center"><?php echo Yii::t('library','Copies Available');?></th>
<th align="center"><?php echo Yii::t('library','Total Copies');?></th>
<th align="center"><?php echo Yii::t('library','Book Position');?></th>
<th align="center"><?php echo Yii::t('library','Shelf No');?></th>
</tr>
<?php
foreach($list as $list_1)
	{
		
		$sub=Subjects::model()->findByAttributes(array('id'=>$list_1->subject));
		$author=Author::model()->findByAttributes(array('auth_id'=>$list_1->author));
		$total_copies = $list_1->copy + $list_1->copy_taken;
	
	?>
<tr>
<td align="center"><?php echo $sub->name;?></td>
<td align="center"><?php echo $list_1->title;?></td>
<td align="center"><?php echo $list_1->isbn;?></td>
<td align="center"><?php 
if($author!=NULL)
{
echo CHtml::link($author->author_name,array('/library/authors/authordetails','id'=>$author->auth_id));
}
?></td>
<td align="center"><?php echo $list_1->copy;?></td>
<td align="center"><?php echo $total_copies;?></td>
<td align="center"><?php echo $list_1->book_position;?></td>
<td align="center"><?php echo $list_1->shelf_no;?></td>
</tr>
<?php } ?>
</table>
</div>
</div>
</td>
</tr>
</table>
    <?php
	}
}
  
?>

 


</div>

 	</div>
    
     <div class="clear"></div> 
     </div>
     <div class="clear"></div> 
    </div>
                           <?php } else { ?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="247" valign="top">
    <?php $this->renderPartial('/settings/library_left');?>
 </td>
    <td valign="top">
    <div class="cont_right">
    <h1><?php echo Yii::t('library','Search Books');?></h1>
    <div class="formCon" >
    <div class="formConInner">
    <table width="90%" border="0" cellspacing="0" cellpadding="0">
  <tr>
 
    <td align="right" style="padding-right:5px;">
 

<?php
echo CHtml::label(Yii::t('library','Search Book by'),'').'</td><td style="padding-right:10px;">'; 
echo CHtml::dropDownList('search','',array('1'=>'subjects','2'=>'title','3'=>'author','4'=>'isbn'),array('prompt'=>'Select','id'=>'search_id')).'</td><td>';
echo CHtml::textField('text','');

				
				
?>

<input type="submit" value="search" class="formbut" />
</td>
 </tr>
</table>
</div>
</div>
<?php

if(isset($list))
{
	 if($list==NULL)
		{
			echo '<div align="center">'.Yii::t('library','<strong>OOPS!!&nbsp;Its an invalid search.Try again..</strong>').'</div>';
		}
		else
		{
	
	?>
    
    <div class="pdtab_Con" style="padding-top:10px;">
     <table width="100%" cellpadding="0" cellspacing="0" border="0" >
<tr class="pdtab-h">
<td align="center"><?php echo Yii::t('library','Subject');?></td>
<td align="center"><?php echo Yii::t('library','Book Title');?></td>
<td align="center"><?php echo Yii::t('library','ISBN');?></td>
<td align="center"><?php echo Yii::t('library','Author');?></td>
<td align="center"><?php echo Yii::t('library','Copies Available');?></td>
<td align="center"><?php echo Yii::t('library','Total Copies');?></td>
<td align="center"><?php echo Yii::t('library','Book Position');?></td>
<td align="center"><?php echo Yii::t('library','Shelf No');?></td>
</tr>
<?php
foreach($list as $list_1)
	{
		
		$sub=Subjects::model()->findByAttributes(array('id'=>$list_1->subject));
		$author=Author::model()->findByAttributes(array('auth_id'=>$list_1->author));
		$total_copies = $list_1->copy + $list_1->copy_taken;
	
	?>
<tr>
<td align="center"><?php echo $sub->name;?></td>
<td align="center"><?php echo $list_1->title;?></td>
<td align="center"><?php echo $list_1->isbn;?></td>
<td align="center"><?php 
if($author!=NULL)
{
echo CHtml::link($author->author_name,array('/library/authors/authordetails','id'=>$author->auth_id));
}
?></td>
<td align="center"><?php echo $list_1->copy;?></td>
<td align="center"><?php echo $total_copies;?></td>
<td align="center"><?php echo $list_1->book_position;?></td>
<td align="center"><?php echo $list_1->shelf_no;?></td>
</tr>
<?php } ?>
</table>
</div>
</div>
</td>
</tr>
</table>
    <?php
	}
}
  }
?>
         <?php $this->endWidget(); ?>