<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'food-info-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>
<div class="formCon" >
<div class="formConInner">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><?php echo $form->labelEx($model,Yii::t('hostel','food_preference')); ?></td>
    <td>&nbsp;</td>
    <td><?php echo $form->textField($model,'food_preference',array('size'=>40,'maxlength'=>120)); ?>
		<?php echo $form->error($model,'food_preference'); ?></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><?php echo $form->labelEx($model,Yii::t('hostel','amount')); ?></td>
    <td>&nbsp;</td>
    <td><?php echo $form->textField($model,'amount',array('size'=>40,'maxlength'=>120)); ?>
		<?php echo $form->error($model,'amount'); ?></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>


	<div >
		<?php echo CHtml::submitButton($model->isNewRecord ?  Yii::t('hostel','Create') : Yii::t('hostel','Save'),array('class'=>'formbut')); ?>
	</div>
</div>
</div>
<?php $this->endWidget(); ?>

</div><!-- form -->