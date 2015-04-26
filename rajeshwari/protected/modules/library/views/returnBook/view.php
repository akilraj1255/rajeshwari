<?php
$this->breadcrumbs=array(
	'Return Books'=>array('/library'),
	$model->id,
);

/*$this->menu=array(
	array('label'=>'List ReturnBook', 'url'=>array('index')),
	array('label'=>'Create ReturnBook', 'url'=>array('create')),
	array('label'=>'Update ReturnBook', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete ReturnBook', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage ReturnBook', 'url'=>array('admin')),
);*/
?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="247" valign="top">

 <?php $this->renderPartial('/settings/library_left');?>
 </td>
    <td valign="top">
    <div class="cont_right formWrapper">
<h1><?php echo Yii::t('library','View ReturnBook'); ?></h1>


<?php


$borrow=BorrowBook::model()->findByAttributes(array('id'=>$model->borrow_book_id));
$book=Book::model()->findByAttributes(array('id'=>$borrow->book_id));
$student=Students::model()->findByAttributes(array('id'=>$borrow->student_id));
?>
<div class="pdtab_Con">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
 <tr class="pdtab-h">
 <td align="center"><?php echo Yii::t('library','Student Name'); ?></td>
 <td align="center"><?php echo Yii::t('library','Book'); ?></td>
 <td align="center"><?php echo Yii::t('library','Issued Date'); ?></td>
 <td align="center"><?php echo Yii::t('library','Return date'); ?></td>
 <td align="center"><?php echo Yii::t('library','Status'); ?></td>

 </tr>
 <tr>
 <td align="center"><?php echo $student->first_name.' '.$student->last_name;?></td>
 <td align="center"><?php echo $book->title;?></td>
 <td align="center"><?php 
 			$settings=UserSettings::model()->findByAttributes(array('user_id'=>Yii::app()->user->id));
								if($settings!=NULL)
								{	
									$date1=date($settings->displaydate,strtotime($model->issue_date));
									
		
								}
								else
								{
									$date1 = $model->issue_date;
									
								}
								echo $date1;
                     ?>
 </td>
 <td align="center"><?php 
 					if($settings!=NULL)
								{	
									$date2=date($settings->displaydate,strtotime($model->return_date));
									
		
								}
								else
								{
									$date2 = $model->return_date;
								}
								echo $date2;
					?>
   </td>
  <td align="center"><?php 
  if($model->return_date >= $borrow->due_date)
  {
	  echo Yii::t('library','Due date expired');
	 // echo Yii::t('library','Due date expired'. ' | '. CHtml::link('Pay Fine',array('/library/ReturnBook/fine','id'=>$borrow->student_id)));
	 
  }
  else
  {
	 echo Yii::t('library','No fine');
	 
	  
  }
  
  ?></td>
 
 </tr>
 </table>
</div>
</div>
</td>
</tr>
</table>


