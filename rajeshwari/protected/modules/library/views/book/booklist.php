<?php
$this->breadcrumbs=array(
	'Books'=>array('/library'),
	'BookList',
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
                           
                           <?php } else { ?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="247" valign="top">
   <?php $this->renderPartial('/settings/library_left');?>
 </td>
    <td valign="top">  
    <div class="cont_right">                
<?php 
    
        if(isset($book_id))
		{
			echo '<h3>'.Yii::t('library','View borrowed book details').'</h3> ';
			$book=BorrowBook::model()->findAllByAttributes(array('book_id'=>$book_id,'status'=>'C'));
			$bookdetails=Book::model()->findByAttributes(array('id'=>$book_id));
		
						
				?>
                <div class="pdtab_Con">
                       <table width="100%" cellpadding="0" cellspacing="0" border="0" >
						<tr class="pdtab-h">
						<td align="center"><?php echo Yii::t('library','Student Name');?></td>
						<td align="center"><?php echo Yii::t('library','Book Name');?></td>
                        <td align="center"><?php echo Yii::t('library','ISBN');?></td>
                        <td align="center"><?php echo Yii::t('library','Author');?></td>
                        <td align="center"><?php echo Yii::t('library','Edition');?></td>
                        <td align="center"><?php echo Yii::t('library','Publisher');?></td>
                        <td align="center"><?php echo Yii::t('library','Copies Available');?></td>
                        <td align="center"><?php echo Yii::t('library','Total Copies');?></td>


						</tr>
					<?php 
						if($book==NULL)
					{
						echo '<tr><td align="center" colspan="7"><strong>'.Yii::t('library','No data available').'</strong></td></tr>';
					
					}
					else
					{
					foreach($book as $book_1)
						{
								$student=Students::model()->findByAttributes(array('id'=>$book_1->student_id));
								$author=Author::model()->findByAttributes(array('auth_id'=>$bookdetails->author));
								$publication=Publication::model()->findByAttributes(array('publication_id'=>$bookdetails->publisher));
								$total_copies = $bookdetails->copy + $bookdetails->copy_taken;
					?>
                    <tr>
                    <td align="center"><?php echo $student->last_name.' '.$student->first_name;?></td>
                    <td align="center"><?php echo $bookdetails->title;?></td>
                    <td align="center"><?php echo $bookdetails->isbn;?></td>
                    <td align="center"><?php echo $author->author_name;?></td>
                    <td align="center"><?php echo $bookdetails->edition;?></td>
                    <td align="center"><?php echo $publication->name;?></td>
                    <td align="center"><?php echo $bookdetails->copy;?></td>
                    <td align="center"><?php echo $total_copies;?></td>
                    
                    
                    </tr>
				<?php }
				} 
				
				 ?>
		</table>
        </div>
      </div>
        </td>
        </tr>
        </table>
		<?php } } ?>
<?php $this->endWidget(); ?>