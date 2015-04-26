<?php
$this->breadcrumbs=array(
	'Books'=>array('/library'),
	'AllBooks',
);?>
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'book-form',
	'enableAjaxValidation'=>false,
)); ?>
<h3><?php echo Yii::t('library','Book Details');?></h3>
                      
<?php 
    
                        if(isset($book_id))
						{
							$book=Book::model()->findAllByAttributes(array('id'=>$book_id));
							if($book!=NULL)
							{
						
						?>
                        <table width="100%" cellpadding="0" cellspacing="0" border="0" style="padding:10px; width:100%;">
<tr>
<td>Y<?php echo Yii::t('library','Book Title');?></td>
<td><?php echo Yii::t('library','ISBN');?></td>
<td><?php echo Yii::t('library','Author');?></td>
<td><?php echo Yii::t('library','Copies Available');?></td>
<td><?php echo Yii::t('library','Book Position');?></td>
<td><?php echo Yii::t('library','Shelf No');?></td>
</tr>
<?php foreach($book as $book_1)
{
	?>
<tr>
<td><?php echo $book_1->title;?></td>
<td><?php echo $book_1->isbn;?></td>
<td><?php echo $book_1->author;?></td>
<td><?php echo $book_1->copy;?></td>
<td><?php echo $book_1->book_position;?></td>
<td><?php echo $book_1->shelf_no;?></td>

</tr>
<?php }
				} 
				else
				{
					echo '<tr><tdcolspan="5">'.Yii::t('library','Sorry!!&nbsp;The details are not available now.').'</td></tr>';
				}
				 ?>
</table>
<?php } ?>
<?php $this->endWidget(); ?>