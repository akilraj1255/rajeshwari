<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'student-document-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'student_id'); ?>
		<?php echo $form->textField($model,'student_id'); ?>
		<?php echo $form->error($model,'student_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'title'); ?>
		<?php echo $form->textField($model,'title',array('size'=>60,'maxlength'=>120)); ?>
		<?php echo $form->error($model,'title'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'file'); ?>
		<?php echo $form->textField($model,'file',array('size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'file'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'file_type'); ?>
		<?php echo $form->textField($model,'file_type',array('size'=>60,'maxlength'=>120)); ?>
		<?php echo $form->error($model,'file_type'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'is_approved'); ?>
		<?php echo $form->textField($model,'is_approved'); ?>
		<?php echo $form->error($model,'is_approved'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'uploaded_by'); ?>
		<?php echo $form->textField($model,'uploaded_by'); ?>
		<?php echo $form->error($model,'uploaded_by'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'created_at'); ?>
		<?php echo $form->textField($model,'created_at'); ?>
		<?php echo $form->error($model,'created_at'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->