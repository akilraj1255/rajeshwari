<div class="formCon" style="width:480px">

<div class="formConInner" style="width:480px" >

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'exams-form',
	'enableAjaxValidation'=>false,
	'htmlOptions'=>array(
            'style'=>'height:auto; width: 450px;'),

)); ?>

	<p class="note"><?php echo Yii::t('examination','Fields with'); ?><span class="required">*</span> <?php echo Yii::t('examination','are required.') ;?></p>

	<?php echo $form->errorSummary($model); ?>

	<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><?php echo $form->labelEx($model,'start_time'); ?></td>
    <td><?php /*?><?php echo $form->textField($model,'start_time'); ?><?php */?>
    	<?php $this->widget('application.extensions.timepicker.timepicker', array(
		'model' => $model,

       'name'=>'start_time',
	   'tabularLevel' => "[]",

));		?>
    
		<?php echo $form->error($model,'start_time'); ?></td>
    <td><?php echo $form->labelEx($model,'end_time'); ?></td>
    <td><?php /*?><?php echo $form->textField($model,'end_time'); ?><?php */?>
    	<?php $this->widget('application.extensions. .timepicker', array(
		'model' => $model,

       'name'=>'end_time',
	   'tabularLevel' => "[]",

));		?>
		<?php echo $form->error($model,'end_time'); ?></td>
  </tr>
  <tr>
  	<td colspan="4">&nbsp;</td>
  </tr>
  <tr>
    <td><?php echo $form->labelEx($model,'maximum_marks'); ?></td>
    <td><?php echo $form->textField($model,'maximum_marks',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'maximum_marks'); ?></td>
    <td><?php echo $form->labelEx($model,'minimum_marks'); ?></td>
    <td><?php echo $form->textField($model,'minimum_marks',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'minimum_marks'); ?></td>
  </tr>
  
</table>
	<br />

	<div class="row">
		<?php //echo $form->labelEx($model,'grading_level_id'); ?>
		<?php echo $form->hiddenField($model,'grading_level_id'); ?>
		<?php echo $form->error($model,'grading_level_id'); ?>
	</div>

	<div class="row">
		<?php //echo $form->labelEx($model,'weightage'); ?>
		<?php echo $form->hiddenField($model,'weightage'); ?>
		<?php echo $form->error($model,'weightage'); ?>
	</div>

	<div class="row">
		<?php //echo $form->labelEx($model,'event_id'); ?>
		<?php echo $form->hiddenField($model,'event_id'); ?>
		<?php echo $form->error($model,'event_id'); ?>
	</div>

	
	<div class="row">
		<?php //echo $form->labelEx($model,'updated_at'); ?>
		<?php echo $form->hiddenField($model,'updated_at',array('value'=>date('Y-m-d'))); ?>
		<?php echo $form->error($model,'updated_at'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? Yii::t('examination','Create') : Yii::t('examination','Save'),array('class'=>'formbut')); ?>
	</div>

<?php $this->endWidget(); ?>

</div></div><!-- form -->