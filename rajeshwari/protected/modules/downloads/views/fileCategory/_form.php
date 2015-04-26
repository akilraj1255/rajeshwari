<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'file-category-form',
	'enableAjaxValidation'=>false,
)); ?>

	

	
<div class="inner_new_form">
	<div class="inner_new_formCon">
    <h3>Fields with <span class="required">*</span> are required.</h3>
   <?php echo $form->errorSummary($model); ?><br />
   <table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td valign="middle"><?php echo $form->labelEx($model,'category'); ?></td>
    <td><?php echo $form->textField($model,'category',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'category'); ?></td>
  </tr>
  <tr>
    <td valign="middle">&nbsp;</td>
    <td style="padding-top:10px;"><?php echo CHtml::submitButton($model->isNewRecord ? Yii::t('downloads','Create') : Yii::t('downloads','Save'),array('class'=>'formbut')); ?></td>
  </tr>
 
</table>

		
		
	

	<div class="row buttons">
		
	</div>
</div>
</div>
<?php $this->endWidget(); ?>

</div><!-- form -->