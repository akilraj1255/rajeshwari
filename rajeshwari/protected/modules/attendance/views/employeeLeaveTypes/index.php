<?php
$this->breadcrumbs=array(
	$this->module->id,
);
?>
<div style="background:#fff; min-height:800px;">  
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
  
    <td valign="top">
    <div style="padding:20px; position:relative;" >
    <h1><?php echo Yii::t('attendance','Employee Leave Types');?></h1>
    
    <?php $this->renderPartial('/default/employee_tab');?>
    <p class="note">Fields with <span class="required">*</span> are required.</p>
    <div class="formCon">
<div class="formConInner">
<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'employee-leave-types-form',
	'enableAjaxValidation'=>false,
)); ?>

	

	<?php echo $form->errorSummary($model); ?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><?php echo $form->labelEx($model,'name'); ?></td>
    <td><?php echo $form->textField($model,'name',array('size'=>30,'maxlength'=>25)); ?>
		<?php echo $form->error($model,'name'); ?></td>
  
    <td><?php echo $form->labelEx($model,'code'); ?></td>
    <td><?php echo $form->textField($model,'code',array('size'=>30,'maxlength'=>25)); ?>
		<?php echo $form->error($model,'code'); ?></td>
  </tr>
  <tr>
  	<td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><?php echo $form->labelEx($model,'max_leave_count'); ?></td>
    <td><?php echo $form->textField($model,'max_leave_count',array('size'=>30,'maxlength'=>25)); ?>
		<?php echo $form->error($model,'max_leave_count'); ?></td>
 <?php /*?>
    <td colspan="2" class="cr_align">
		<?php echo $form->checkBox($model,'carry_forward'); ?>
		<?php echo $form->error($model,'carry_forward'); ?>
        <?php echo $form->labelEx($model,'carry_forward'); ?>
        </td><?php */?>
    
  </tr>
   <tr>
  	<td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>


	<div class="cr_align" >
		<?php echo $form->labelEx($model,'status'); ?>
		<?php echo $form->radioButtonList($model,'status',array('1'=>'Active','2'=>'Inactive'),array('separator'=>' ')); ?>
		<?php echo $form->error($model,'status'); ?>
	</div>

	<div class="clear"></div>
<br />
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? Yii::t('attendance','Create') : Yii::t('attendance','Save'),array('class'=>'formbut')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
</div>
</div>
<h3><?php echo Yii::t('attendance','Active Leave types');?></h3>
<div class="tableinnerlist">
<table width="100%" cellpadding="0" cellspacing="0">
<tr class="pdtab-h">
	<td style="text-align:left;"><?php echo Yii::t('attendance','Leave Type'); ?></td>
    <td><?php echo Yii::t('attendance','Edit'); ?></td>
    <td><?php echo Yii::t('attendance','Delete'); ?></td>
</tr>


<?php
$active=EmployeeLeaveTypes::model()->findAll("status=:x", array(':x'=>1));
foreach($active as $active_1)
{
   echo '<tr><td style="padding-left:10px; text-align:left;">'.$active_1->name.'</td>';	
   echo '<td>'.CHtml::link(Yii::t('attendance','Edit'), array('update', 'id'=>$active_1->id)).'</td>';
    echo '<td>'.CHtml::link(Yii::t('attendance','Delete'), array('delete', 'id'=>$active_1->id),array('confirm'=>'Are You Sure?')).'</td></tr>';
}
?>
</table>
</div>
<br />
<h3><?php echo Yii::t('attendance','Inactive Leave types');?></h3>
<div class="tableinnerlist">
<table width="100%" cellpadding="0" cellspacing="0">
<tr class="pdtab-h">
	<td style="text-align:left;"><?php echo Yii::t('attendance','Leave Type'); ?></td>
    <td><?php echo Yii::t('attendance','Edit'); ?></td>
    <td><?php echo Yii::t('attendance','Delete'); ?></td>
</tr>

<?php
$inactive=EmployeeLeaveTypes::model()->findAll("status=:x", array(':x'=>2));
foreach($inactive as $inactive_1)
{
   echo '<tr><td style="padding-left:10px; text-align:left;">'.$inactive_1->name.'</td>';	
   echo '<td>'.CHtml::link(Yii::t('attendance','Edit'), array('update', 'id'=>$inactive_1->id)).'</td>';
    echo '<td>'.CHtml::link(Yii::t('attendance','Delete'), array('delete', 'id'=>$inactive_1->id),array('confirm'=>'Are You Sure?')).'</td></tr>';
}
?>
</table>
</div>

</div>
    </td>
  </tr>
</table>
</div>