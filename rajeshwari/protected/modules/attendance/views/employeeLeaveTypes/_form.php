<div class="formCon">

<div class="formConInner">

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'employee-leave-types-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note"><?php echo Yii::t('attendance','Fields with ');?><span class="required">*</span><?php echo Yii::t('attendance',' are required.');?></p>

	<?php echo $form->errorSummary($model); ?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><?php echo $form->labelEx($model,'name'); ?></td>
    <td>&nbsp;</td>
    <td><?php echo $form->textField($model,'name',array('size'=>30,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'name'); ?></td>
  </tr>
  <tr>
  	<td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><?php echo $form->labelEx($model,'code'); ?></td>
    <td>&nbsp;</td>
    <td><?php echo $form->textField($model,'code',array('size'=>30,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'code'); ?></td>
  </tr>
  <tr>
  	<td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
 <tr>
    <td><?php echo $form->labelEx($model,'status'); ?></td>
    <td>&nbsp;</td>
    <td> 
    	<div class="cr_align" >
			<?php echo $form->radioButtonList($model,'status',array('1'=>'Active','2'=>'Inactive'),array('separator'=>' ')); ?>
         	<?php echo $form->error($model,'status'); ?>
		</div>
	</td>
  </tr>
  <tr>
  	<td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><?php echo $form->labelEx($model,'max_leave_count'); ?></td>
    <td>&nbsp;</td>
    <td><?php echo $form->textField($model,'max_leave_count',array('size'=>30,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'max_leave_count'); ?></td>
  </tr>
  <tr>
  	<td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <?php /*?><tr>
    <td><?php echo $form->labelEx($model,'carry_forward'); ?></td>
    <td>&nbsp;</td>
    <td><?php echo $form->textField($model,'carry_forward'); ?>
		<?php echo $form->error($model,'carry_forward'); ?></td>
  </tr><?php */?>
</table>

	<div style="padding:20px 0 0 0px;">
		<?php echo CHtml::submitButton($model->isNewRecord ? Yii::t('attendance','Create') : Yii::t('attendance','Save'),array('class'=>'formbut')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
</div>
</div>