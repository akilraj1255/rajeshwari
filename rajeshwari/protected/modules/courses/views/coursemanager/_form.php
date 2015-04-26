<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'coursemanager-form',
	'enableAjaxValidation'=>false,
)); ?>
    <?php $this->renderPartial('/courses/left_side');?>
	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'user_id'); ?>
		<?php echo $form->textField($model,'user_id'); ?>
		<?php echo $form->error($model,'user_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'course'); ?>
		<?php echo $form->textField($model,'course',array('size'=>60,'maxlength'=>120)); ?>
		<?php echo $form->error($model,'course'); ?>
	</div>



	
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->