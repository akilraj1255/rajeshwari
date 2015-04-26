<?php
$this->breadcrumbs=array(
	'Authors'=>array('index'),
	$model->auth_id,
);


?>
<?php 

              $roles=Rights::getAssignedRoles(Yii::app()->user->Id); // check for single role
					
						  foreach($roles as $role)
						  
						   if(sizeof($roles)==1 and $role->name == 'student')
						   { ?>
                           <div id="parent_Sect">
    <?php $this->renderPartial('/settings/studentleft');?>
    
    <div id="parent_rightSect">
        	<div class="parentright_innercon">
            	<h1>Author Details</h1>
        	<div class="profile_details">
<?php
$book=Book::model()->findAll('author=:x',array(':x'=>$_REQUEST['id']));
if($book!=NULL)
{
	?>
    <div class="pdtab_Con">
    <table width="100%" cellpadding="0" cellspacing="0" border="0" >
<tr class="pdtab-h">
<th align="center"><?php echo Yii::t('library','Author Name');?></th>
<th align="center"><?php echo Yii::t('library','Subject');?></th>
<th align="center"><?php echo Yii::t('library','Book Title');?></th>
<th align="center"><?php echo Yii::t('library','ISBN');?></th>
<th align="center"><?php echo Yii::t('library','Publication');?></th>
</tr>
    <?php
	foreach($book as $book_1)
	{
		$author=Author::model()->findByAttributes(array('auth_id'=>$_REQUEST['id']));
		$sub=Subjects::model()->findByAttributes(array('id'=>$book_1->subject));
		$publication=Publication::model()->findByAttributes(array('publication_id'=>$book_1->publisher));
		?>
        <tr>
<td align="center"><?php echo ucfirst($author->author_name);?></td>
<td align="center"><?php echo $sub->name;?></td>
<td align="center"><?php echo $book_1->title;?></td>
<td align="center"><?php echo $book_1->isbn;?></td>
<td align="center"><?php echo $publication->name;?></td>

</tr>
<?php } ?>
</table>
</div>
</div>
</td>
</tr>
</table>
        <?php
	
		}?>
</div>
 </div>
    
     <div class="clear"></div> 
     </div>
                           <?php } else {?>

<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="247" valign="top">
 <?php $this->renderPartial('/settings/library_left');?>
 
 </td>
    <td valign="top">
    <div class="cont_right formWrapper">
<h1><?php echo Yii::t('library','Author Details');?></h1>
<div style="top:12px; right:15px" class="edit_bttns">
    <ul>
    <li>
    <?php echo CHtml::link(Yii::t('library','<span>View Authors</span>'),array('/library/authors'));
?> </li>
    </ul>
    <div class="clear"></div>
    </div>                                                                                                                                                                                                                                                                                                                                                                            
<?php
$book=Book::model()->findAll('author=:x',array(':x'=>$_REQUEST['id']));
if($book!=NULL)
{
	?>
    <div class="pdtab_Con">
    <table width="100%" cellpadding="0" cellspacing="0" border="0" >
<tr class="pdtab-h">
<td align="center"><?php echo Yii::t('library','Author Name');?></td>
<td align="center"><?php echo Yii::t('library','Subject');?></td>
<td align="center"><?php echo Yii::t('library','Book Title');?></td>
<td align="center"><?php echo Yii::t('library','ISBN');?></td>
<td align="center"><?php echo Yii::t('library','Publication');?></td>
</tr>
    <?php
	foreach($book as $book_1)
	{
		$author=Author::model()->findByAttributes(array('auth_id'=>$_REQUEST['id']));
		$sub=Subjects::model()->findByAttributes(array('id'=>$book_1->subject));
		$publication=Publication::model()->findByAttributes(array('publication_id'=>$book_1->publisher));
		?>
        <tr>
<td align="center"><?php echo ucfirst($author->author_name);?></td>
<td align="center"><?php echo $sub->name;?></td>
<td align="center"><?php echo $book_1->title;?></td>
<td align="center"><?php echo $book_1->isbn;?></td>
<td align="center"><?php echo $publication->name;?></td>

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
