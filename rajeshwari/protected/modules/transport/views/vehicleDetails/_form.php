<div class="form">
    <?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'vehicle-details-form',
	'enableAjaxValidation'=>false,
)); ?>
    <p class="note">Fields with <span class="required">*</span> are required.</p>
    <?php echo $form->errorSummary($model); ?>
     <div class="formCon" >
<div class="formConInner">
    <table width="80%" border="0" cellspacing="0" cellpadding="0">
        <tr>
            <td>
                <?php echo $form->labelEx($model,Yii::t('transport','vehicle_no')); ?>
            </td>
            <td>&nbsp;
            </td>
            <td>
                <?php echo $form->textField($model,'vehicle_no',array('size'=>20)); ?>
                <?php echo $form->error($model,'vehicle_no'); ?>
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
                <?php echo $form->labelEx($model,Yii::t('transport','vehicle_code')); ?>
            </td>
            <td>&nbsp;
            </td>
            <td>
                <?php echo $form->textField($model,'vehicle_code',array('size'=>20)); ?>
                <?php echo $form->error($model,'vehicle_code'); ?>
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
                <?php echo $form->labelEx($model,Yii::t('transport','no_of_seats')); ?>
            </td>
            <td>&nbsp;
            </td>
            <td>
                <?php echo $form->textField($model,'no_of_seats',array('size'=>20)); ?>
                <?php echo $form->error($model,'no_of_seats'); ?>
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
                <?php echo $form->labelEx($model,Yii::t('transport','Maximum allowed')); ?>
            </td>
            <td>&nbsp;
            </td>
            <td>
                <?php echo $form->textField($model,'maximum_capacity',array('size'=>20)); ?>
                <?php echo $form->error($model,'maximum_capacity'); ?>
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
                <?php echo $form->labelEx($model,Yii::t('transport','vehicle_type')); ?>
            </td>
            <td>&nbsp;
            </td>
            <td>
                <?php echo $form->dropDownList($model,'vehicle_type',array('1'=>'Contract','2'=>'Ownership'),array('prompt'=>'Select')); ?>
                <?php echo $form->error($model,'vehicle_type'); ?>
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
                <?php echo $form->labelEx($model,Yii::t('transport','address')); ?>
            </td>
            <td>&nbsp;
            </td>
            <td>
                <?php echo $form->textField($model,'address',array('size'=>20)); ?>
                <?php echo $form->error($model,'address'); ?>
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
                <?php echo $form->labelEx($model,Yii::t('transport','city')); ?>
            </td>
            <td>&nbsp;
            </td>
            <td>
                <?php echo $form->textField($model,'city',array('size'=>20)); ?>
                <?php echo $form->error($model,'city'); ?>
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
                <?php echo $form->labelEx($model,Yii::t('transport','state')); ?>
            </td>
            <td>&nbsp;
            </td>
            <td>
                <?php echo $form->textField($model,'state',array('size'=>20)); ?>
                <?php echo $form->error($model,'state'); ?>
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
                <?php echo $form->labelEx($model,Yii::t('transport','phone')); ?>
            </td>
            <td>&nbsp;
            </td>
            <td>
                <?php echo $form->textField($model,'phone',array('size'=>20)); ?>
                <?php echo $form->error($model,'phone'); ?>
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
                <?php echo $form->labelEx($model,Yii::t('transport','insurance')); ?>
            </td>
            <td>&nbsp;
            </td>
            <td>
                <?php echo $form->textField($model,'insurance',array('size'=>20)); ?>
                <?php echo $form->error($model,'insurance'); ?>
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
                <?php echo $form->labelEx($model,Yii::t('transport','tax_remitted')); ?>
            </td>
            <td>&nbsp;
            </td>
            <td>
                <?php echo $form->textField($model,'tax_remitted',array('size'=>20)); ?>
                <?php echo $form->error($model,'tax_remitted'); ?>
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
                <?php echo $form->labelEx($model,Yii::t('transport','permit')); ?>
            </td>
            <td>&nbsp;
            </td>
            <td>
                <?php echo $form->textField($model,'permit',array('size'=>20)); ?>
                <?php echo $form->error($model,'permit'); ?>
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
</div>
<!-- form -->