<div class="form">

   <?php
   $student=Students::model()->findByAttributes(array('uid'=>Yii::app()->user->id));
   
   $register=Registration::model()->findByAttributes(array('student_id'=>$student->id));
   if($register==NULL)
   {
   ?> 
   <?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'registration-form',
	'enableAjaxValidation'=>false,
)); ?>
                 
<table width="100%" border="0" cellspacing="0" cellpadding="0">
 
    <?php echo $form->hiddenField($model,'student_id',array('value'=>$student->id)); ?>
  <tr>
    <td width="30%"><?php echo $form->labelEx($model,Yii::t('hostel','food_preference'),array('style'=>'color:#333333;')); ?></td>
    <td>&nbsp;</td>
    <td width="70%"><?php echo $form->dropDownList($model,'food_preference',CHtml::listData(FoodInfo::model()->findAll(),'id','food_preference'),array('prompt'=>'Select')); ?>
		<?php echo $form->error($model,'food_preference'); ?></td>
  </tr>
  
  
</table>

	<div class="row buttons" style="padding-top:15px;">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save',array('class'=>'formbut')); ?>
	</div>

<?php $this->endWidget(); ?>
<?php } else
{
	?>
    <div align="center"><strong>Successfully registered for hostel facility</strong></div>
    
    <?php
}

?>
</div><!-- form -->