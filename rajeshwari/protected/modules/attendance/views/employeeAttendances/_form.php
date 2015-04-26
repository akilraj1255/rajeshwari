
<div class="form" style="padding-left:20px;">
<br />
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'employee-attendances-form',
	'enableAjaxValidation'=>true,
)); ?>

	<p class="note"><?php echo Yii::t('attendance','Fields with ');?><span class="required">*</span><?php echo Yii::t('attendance',' are required.');?></p>

	<?php /*?><?php echo $form->errorSummary($model); ?><?php */?>

	<div class="row">
		<?php //echo $form->labelEx($model,'attendance_date'); ?>
		<?php echo $form->hiddenField($model,'attendance_date',array('value'=>$year.'-'.$month.'-'.$day));?>
		<?php echo $form->error($model,'attendance_date'); ?>
	</div>

	<div class="row">
		<?php //echo $form->labelEx($model,'employee_id'); ?>
		<?php echo $form->hiddenField($model,'employee_id',array('value'=>$emp_id)); ?>
		<?php echo $form->error($model,'employee_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'employee_leave_type_id'); ?>
		<?php //echo $form->textField($model,'employee_leave_type_id'); ?>
        <?php echo $form->dropDownList($model,'employee_leave_type_id',CHtml::listData(EmployeeLeaveTypes::model()->findAll(), 'id', 'name'),array('empty'=>'select Type')); ?>
		<?php echo $form->error($model,'employee_leave_type_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'reason'); ?>
		<?php echo $form->textField($model,'reason',array('size'=>30,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'reason'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'is_half_day'); ?>
		<?php echo $form->checkBox($model,'is_half_day'); ?>
		<?php echo $form->error($model,'is_half_day'); ?>
	</div><br />

	<div class="row buttons">
		<?php //echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
        <?php 
		
		echo CHtml::ajaxSubmitButton(Yii::t('attendance','Save'),CHtml::normalizeUrl(array('EmployeeAttendances/Addnew','render'=>false)),array('success'=>'js: function(data) {
						$("#td'.$day.$emp_id.'").text("");
						$("#jobDialog123'.$day.$emp_id.'").html("<span class=\"abs\"></span>","");
						$("#jobDialog'.$day.$emp_id.'").dialog("close");
						window.location.reload();
                    }'),array('id'=>'closeJobDialog'.$day.$emp_id,'name'=>'save'));
		
		?>
	</div><br />

<?php $this->endWidget(); ?>

</div><!-- form -->