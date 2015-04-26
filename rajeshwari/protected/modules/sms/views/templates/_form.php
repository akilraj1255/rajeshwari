<style type="text/css">
	
.formCon input[type="text"], input[type="password"], textArea, select {
    background: none repeat scroll 0 0 #FFFFFF;
    border: 1px solid #C2CFD8;
    border-radius: 2px;
    box-shadow: -1px 1px 2px #D5DBE0 inset;
    padding: 6px;
    width: 350px !important;
}

textArea{ width:350px !important;}

.formbut_yellow button, input[type="submit"] {
    background: url("images/fbut-bg.png") repeat-x scroll 0 0 rgba(0, 0, 0, 0) !important;
    border: 1px solid #B58530 !important;
}


</style>

<div class="formCon" style="width:96%;">
<div class="formConInner">
<div class="form" >
<div class="class="listbxtop_hdng">

<div class="emp_tab_nav">
	<ul>
    	<li></li>
    
    </ul>
</div>

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'sms-templates-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	
    
    <div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name'); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>
<br>
	<div class="row">
		<?php echo $form->labelEx($model,'template'); ?>
		<?php echo $form->textArea($model,'template',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'template'); ?>
	</div>
 
	<div class="row buttons">
    <br>
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array('class'=>'formbut')); ?>
	</div>

<?php $this->endWidget(); ?>
</div>
</div>
</div>
</div><!-- form -->