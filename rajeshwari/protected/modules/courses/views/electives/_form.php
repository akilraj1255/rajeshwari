<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'electives-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note"><?php echo Yii::t('Electives','Fields with');?><span class="required">*</span><?php echo Yii::t('Electives',' are required.');?></p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'elective_group_id'); ?>
		<?php echo $form->textField($model,'elective_group_id'); ?>
		<?php echo $form->error($model,'elective_group_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'created_at'); ?>
		<?php echo $form->textField($model,'created_at'); ?>
		<?php echo $form->error($model,'created_at'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'updated_at'); ?>
		<?php echo $form->textField($model,'updated_at'); ?>
		<?php echo $form->error($model,'updated_at'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? Yii::t('Electives','Create') : Yii::t('Electives','Save')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->