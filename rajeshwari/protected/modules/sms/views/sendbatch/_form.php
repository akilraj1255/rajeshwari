<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'sms-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'uid'); ?>
		<?php 
        
        if (Yii::app()->user->isSuperuser) {
       $all_roles=new RAuthItemDataProvider('roles', array( 
    'type'=>2,
    ));
      $data=$all_roles->fetchData();
?>
    
        <?php echo $form->dropDownList($model,'uid',CHtml::listData($data,'name','name'),array('id'=>'sms-to','prompt'=>'select'));?> 
        
        
		<?php echo $form->error($model,'uid');
		
		}?>
	</div>

	

	<div class="row">
		<?php echo $form->labelEx($model,'message'); ?>
		<?php echo $form->textArea($model,'message',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'message'); ?>
	</div>

	

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->