<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'mess-manage-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,Yii::t('hostel','student_id')); ?>
		<?php echo $form->textField($model,'student_id',array('size'=>20)); ?>
		<?php echo $form->error($model,'student_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,Yii::t('hostel','food_preference')); ?>
		<?php echo $form->textField($model,'food_preference',array('size'=>20)); ?>
		<?php echo $form->error($model,'food_preference'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,Yii::t('hostel','amount')); ?>
		<?php echo $form->textField($model,'amount',array('size'=>20)); ?>
		<?php echo $form->error($model,'amount'); ?>
	</div>

	<div class="row">
		<?php //echo $form->labelEx($model,'status'); ?>
		<?php //echo $form->textField($model,'status',array('size'=>60,'maxlength'=>120)); ?>
		<?php //echo $form->error($model,'status'); ?>
	</div>

	<div class="row">
		<?php //echo $form->labelEx($model,'created'); ?>
		<?php echo $form->hiddenField($model,'created',array('value'=>date('Y-m-d'))); ?>
		<?php //echo $form->error($model,'created'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? Yii::t('hostel','Create') : Yii::t('hostel','Save')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->