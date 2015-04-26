<?php
$this->breadcrumbs=array(
	'Books'=>array('/library'),
	'Manage',
);?>

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'borrow-book-form',
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
        	<div class="parentright_innercon" style="position:relative;">
            	<h1>Book List</h1>
                <div class="but_right_con" style=" position:absolute; top:47px; right:-69px;"><?php echo CHtml::link(Yii::t('library','Search Books'),array('/library/book/booksearch'),array('class'=>'com_but')); ?></div>
                <div class="profile_details">
        	

<?php
       $bookdetails=Book::model()->findAll('is_deleted=:x',array(':x'=>0));?>
        <div class="pdtab_Con">
					<table width="100%" cellpadding="0" cellspacing="0" border="0">
					<tr class="pdtab-h">
					<th align="center"><?php echo Yii::t('library','ISBN');?></th>
					<th align="center"><?php echo Yii::t('library','Book Name');?></th>
					<th align="center"><?php echo Yii::t('library','Author');?></th>
					<th align="center"><?php echo Yii::t('library','Edition');?></th>
					<th align="center"><?php echo Yii::t('library','Publisher');?></th>
					<th align="center"><?php echo Yii::t('library','Copies Available');?></th>
					<th align="center"><?php echo Yii::t('library','Total Copies');?></th>
					</tr>
      <?php
       if($bookdetails!=NULL)
			{
					
					
					?>
					
					<?php foreach($bookdetails as $book)
					{
						$author=Author::model()->findByAttributes(array('auth_id'=>$book->author));
						$publication=Publication::model()->findByAttributes(array('publication_id'=>$book->publisher));
						$total_copies = $book->copy + $book->copy_taken;
						?>
					<tr>
					
					<td align="center"><?php echo $book->isbn;?></td>
					<td align="center"><?php echo $book->title;?></td>
					<td align="center"><?php 
					if($author!=NULL)
					{
									echo CHtml::link(ucfirst($author->author_name), array('/library/authors/authordetails','id'=>$author->auth_id));
					}
					?></td>
					<td align="center"><?php echo $book->edition;?></td>
					<td align="center"><?php 
					if($publication!=NULL)
					{
					echo $publication->name;
					}?></td>
                    <td align="center"><?php echo $book->copy;?></td>
					<td align="center"><?php echo $total_copies; ?></td>
					
					</tr>
					<?php
				
			}
									
			} 
			else
			{
				echo '<tr><td align="center" colspan="7">'.Yii::t('library','No data available').'</td></tr>';
			}
				 ?>
</table>
</div>
</div>



 	</div>
    
     <div class="clear"></div> 
     </div>
     <div class="clear"></div> 
    </div>
                           <?php
						   }
						   else
						   {
						 ?>

<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="247" valign="top">
     <?php $this->renderPartial('/settings/library_left');?>
 </td>
    <td valign="top">
    <div class="cont_right">
<h1><?php echo Yii::t('library','Manage Books');?></h1>
<?php
$bookdetails=Book::model()->findAll('is_deleted=:x',array(':x'=>0));?>
<div class="pdtab_Con">
<table width="100%" cellpadding="0" cellspacing="0" border="0">
<tr class="pdtab-h">
<td align="center"><?php echo Yii::t('library','ISBN');?></td>
<td align="center"><?php echo Yii::t('library','Book Name');?></td>
<td align="center"><?php echo Yii::t('library','Author');?></td>
<td align="center"><?php echo Yii::t('library','Edition');?></td>
<td align="center"><?php echo Yii::t('library','Publisher');?></td>
<td align="center"><?php echo Yii::t('library','Copies Available');?></td>
<td align="center"><?php echo Yii::t('library','Total Copies');?></td>
<td align="center"><?php echo Yii::t('library','Options');?></td>
</tr>
<?php
if($bookdetails!=NULL)
{


?>
 
<?php foreach($bookdetails as $book)
{
	$author=Author::model()->findByAttributes(array('auth_id'=>$book->author));
	$publication=Publication::model()->findByAttributes(array('publication_id'=>$book->publisher));
	$total_copies = $book->copy + $book->copy_taken;
	?>
<tr>

<td align="center"><?php echo $book->isbn;?></td>
<td align="center"><?php echo $book->title;?></td>
<td align="center"><?php 
				echo CHtml::link(ucfirst($author->author_name), array('/library/authors/authordetails','id'=>$author->auth_id));
?></td>
<td align="center"><?php echo $book->edition;?></td>
<td align="center"><?php echo $publication->name;?></td>
<td align="center"><?php echo $book->copy;?></td>
<td align="center"><?php echo $total_copies;?></td>
<td align="center">
<?php echo CHtml::link('Edit',array('book/update','id'=>$book->id));?> &verbar;
<?php echo CHtml::link('Remove',array('book/remove','id'=>$book->id),array('onclick'=>'js:if(confirm("Remove book ?")){}else{return false;}'));?>
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