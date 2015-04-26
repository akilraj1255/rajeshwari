<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'floor-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>
    <div class="formCon">
<div class="formConInner">
	<table width="60%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><?php echo $form->labelEx($model,Yii::t('hostel','Hostel Name')); ?></td>
    <td>&nbsp; </td>
    <td><?php echo $form->dropDownList($model,'hostel_id',CHtml::listData(Hosteldetails::model()->findAll('is_deleted=:x',array(':x'=>'0')),'id','hostel_name'),array('prompt'=>'Select')); ?>
		<?php echo $form->error($model,'hostel_id'); ?></td>
  </tr>
   <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><?php echo $form->labelEx($model,Yii::t('hostel','floor_no')); ?></td>
    <td>&nbsp;</td>
    <td><?php echo $form->textField($model,'floor_no',array('size'=>20)); ?>
		<?php echo $form->error($model,'floor_no'); ?></td>
  </tr>
   <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><?php echo $form->labelEx($model,Yii::t('hostel','No Of Rooms')); ?></td>
    <td>&nbsp;</td>
    <td><?php echo $form->textField($model,'no_of_rooms',array('size'=>20)); ?>
		<?php echo $form->error($model,'no_of_rooms'); ?></td>
  </tr>
 
</table>

	<div class="row">
		<?php //echo $form->labelEx($model,'created'); ?>
		<?php echo $form->hiddenField($model,'created',array('value'=>date('Y-m-d'))); ?>
		<?php echo $form->error($model,'created'); ?>
	</div>

	<div style="padding-top:20px;">
		<?php echo CHtml::submitButton($model->isNewRecord ?  Yii::t('hostel','Create') : Yii::t('hostel','Save'),array('class'=>'formbut')); ?>
	</div>
</div>
</div>
<?php $this->endWidget(); ?>

</div><!-- form -->