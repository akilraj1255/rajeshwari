<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'roomrequest-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'student_id'); ?>
		<?php echo $form->textField($model,'student_id',array('size'=>60,'maxlength'=>120)); ?>
		<?php echo $form->error($model,'student_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'allot_id'); ?>
		<?php echo $form->textField($model,'allot_id',array('size'=>60,'maxlength'=>120)); ?>
		<?php echo $form->error($model,'allot_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'status'); ?>
		<?php echo $form->textField($model,'status',array('size'=>60,'maxlength'=>120)); ?>
		<?php echo $form->error($model,'status'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? Yii::t('hostel','Create') : Yii::t('hostel','Save')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->