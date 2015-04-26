<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'stop-edit-form',
	'enableAjaxValidation'=>false,
)); ?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
        <td width="247" valign="top">
        	<?php $this->renderPartial('/transportation/trans_left');?>
        </td>
        <td valign="top"> 
            <div class="cont_right">
            	<h1><?php echo Yii::t('transport','Stop Details');?></h1>
                <table width="80%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                    <td>
                        <?php echo $form->labelEx($model,Yii::t('transport','stop_name')); ?>
                    </td>
                    <td>&nbsp;
                    </td>
                    <td>
                        <?php echo $form->textField($model,'stop_name',array('size'=>20)); ?>
                        <?php echo $form->error($model,'stop_name'); ?>
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
                        <?php echo $form->labelEx($model,Yii::t('transport','fare')); ?>
                    </td>
                    <td>&nbsp;
                    </td>
                    <td>
                        <?php echo $form->textField($model,'fare',array('size'=>20)); ?>
                        <?php echo $form->error($model,'fare'); ?>
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
                        <?php echo $form->labelEx($model,Yii::t('transport','Morning Arrival')); ?>
                    </td>
                    <td>&nbsp;
                    </td>
                    <td>
                         <?php echo $form->textField($model,'arrival_mrng',array('size'=>20)); ?>
                 
                        <?php echo $form->error($model,'arrival_mrng'); ?>
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
                        <?php echo $form->labelEx($model,Yii::t('transport','Evening Arrival')); ?>
                    </td>
                    <td>&nbsp;
                    </td>
                    <td>
                        <?php echo $form->textField($model,'arrival_evng',array('size'=>20)); ?>
                        <?php echo $form->error($model,'arrival_evng'); ?>
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
                    <td>&nbsp;
                    </td>
                    <td>&nbsp;
                    </td>
                    <td>&nbsp;
                    </td>
                </tr>
                </table>
                <div class="row buttons">
	                <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
                </div>            
  			</div>
        </td>
    </tr>
</table>

<?php $this->endWidget(); ?>