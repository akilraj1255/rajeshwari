<div class="formCon" style="width:60%">

<div class="formConInner">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'finance-fee-categories-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'description'); ?>
		<?php echo $form->textArea($model,'description',array('rows'=>6, 'cols'=>47,)); ?>
		<?php echo $form->error($model,'description'); ?>
	</div>
<h3>Selectc Batches</h3>
	<div class="fn_align">
    <?php $data = CHtml::listData(Batches::model()->findAll("is_active=:x", array(':x'=>1)), 'id', 'name');
     
                echo $form->checkBoxList($model,'batch_id', $data,array( 'htmlOption'=>'style=clear:both')); ?>
                </div>


	<div class="row">
		<?php //echo $form->labelEx($model,'is_deleted'); ?>
		<?php echo $form->hiddenField($model,'is_deleted'); ?>
		<?php echo $form->error($model,'is_deleted'); ?>
	</div>

	<div class="row">
		<?php //echo $form->labelEx($model,'is_master'); ?>
		<?php echo $form->hiddenField($model,'is_master',array('value'=>1)); ?>
		<?php echo $form->error($model,'is_master'); ?>
	</div>

	<div class="row">
		<?php //echo $form->labelEx($model,'created_at'); ?>
		<?php echo $form->hiddenField($model,'created_at',array('value'=>date('Y-m-d'))); ?>
		<?php echo $form->error($model,'created_at'); ?>
	</div>

	<div class="row">
		<?php //echo $form->labelEx($model,'updated_at'); ?>
		<?php echo $form->hiddenField($model,'updated_at',array('value'=>date('Y-m-d'))); ?>
		<?php echo $form->error($model,'updated_at'); ?>
	</div>
<div class="clear"></div> <br />
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save',array('class'=>'formbut')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
</div>