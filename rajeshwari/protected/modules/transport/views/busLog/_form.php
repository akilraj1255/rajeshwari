<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'bus-log-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>
	 <div class="formCon" >
<div class="formConInner">
 <table width="80%" border="0" cellspacing="0" cellpadding="0">
 <?php if(isset($_REQUEST['vehicle_id']) and $_REQUEST['vehicle_id'] != NULL)
 {
	  $vehicle = VehicleDetails::model()->findByAttributes(array('id'=>$_REQUEST['vehicle_id']));
	  
	 
 }?>
        <tr>
            <td>
                <?php echo $form->labelEx($model,Yii::t('transport','Select Vehicle'),array('style'=>'float:left')); ?> <span class="required">*</span> 
            </td>
            <td>&nbsp;
            </td>
            <td>
                  <?php $criteria = new CDbCriteria;
		         $criteria->compare('is_deleted',0); ?>
                <?php echo $form->dropDownList($model,'vehicle_id',CHtml::listData(VehicleDetails::model()->findAll($criteria),'id','vehicle_code'),array('prompt'=>'Select'));?>
                <?php echo $form->error($model,'vehicle_id'); ?>
            </td>
        </tr>
        <tr>
        	<td>&nbsp;
            </td>
            <td>&nbsp;
            </td>
            <td>&nbsp;
            </td>
        </tr>
        <tr>
            <td>
                <?php echo $form->labelEx($model,Yii::t('transport','start_time_reading')); ?>
            </td>
            <td>&nbsp; 
            </td>
            <td>
               <?php echo $form->textField($model,'start_time_reading',array('size'=>20)); ?>
                <?php echo $form->error($model,'start_time_reading'); ?>
            </td>
        </tr>
        <tr>
        	<td>&nbsp;
            </td>
            <td>&nbsp;
            </td>
            <td>&nbsp;
            </td>
        </tr>
        <tr>
            <td>
                <?php echo $form->labelEx($model,Yii::t('transport','end_time_reading'));?>
            </td>
            <td>&nbsp;
            </td>
            <td>
                <?php echo $form->textField($model,'end_time_reading',array('size'=>20)); ?> 
                <?php echo $form->error($model,'end_time_reading'); ?>
            </td>
        </tr>
        <tr>
        	<td>&nbsp;
            </td>
            <td>&nbsp;
            </td>
            <td>&nbsp;
            </td>
        </tr>
        </table>
		</div>
        </div>
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save',array('class'=>'formbut'));  ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->