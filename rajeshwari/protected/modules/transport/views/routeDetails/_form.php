<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'route-details-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>
	 <div class="formCon" >
<div class="formConInner">
	<table width="80%" border="0" cellspacing="0" cellpadding="0">
        <tr>
            <td>
                <?php echo $form->labelEx($model,Yii::t('transport','route_name')); ?>
            </td>
            <td>&nbsp;
            </td>
            <td>
                <?php echo $form->textField($model,'route_name',array('size'=>20)); ?>
                <?php echo $form->error($model,'route_name'); ?>
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
                <?php echo $form->labelEx($model,Yii::t('transport','no_of_stops')); ?>
            </td>
            <td>&nbsp;
            </td>
            <td>
                <?php echo $form->textField($model,'no_of_stops',array('size'=>20)); ?>
                <?php echo $form->error($model,'no_of_stops'); ?>
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
                <?php echo $form->labelEx($model,Yii::t('transport','vehicle_id')); ?>
            </td>
            <td>&nbsp;
            </td>
            <td>
                <?php echo $form->dropDownList($model,'vehicle_id',CHtml::listData(VehicleDetails::model()->findAll('status=:x',array(':x'=>'C')),'id','vehicle_code'),array('prompt'=>'Select')); ?>
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
	
	</table>
    </div>
    </div>
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save',array('class'=>'formbut')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->