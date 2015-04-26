<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'fuel-consumption-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>
<?php  
if(isset($_REQUEST['id']) && ($_REQUEST['id']!=NULL))
{
	$route=BusLog::model()->findByAttributes(array('id'=>$_REQUEST['id']));
	if($route!=NULL)
	{
		$id=$route->vehicle_id;
	}
?>
 <div class="formCon" >
<div class="formConInner">
<table width="80%" border="0" cellspacing="0" cellpadding="0">
        <tr>
            <td>
                <?php //echo $form->labelEx($model,Yii::t('transport','vehicle_id')); ?>
            </td>
            <td>&nbsp;
            </td>
            <td>
             <?php echo $form->hiddenField($model,'vehicle_id',array('size'=>20,'value'=>$id)); ?>
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
                <?php echo $form->labelEx($model,Yii::t('transport','Fuel in litres'), array('style'=>'float:left')); ?> <span class="required">*</span>
            </td>
            <td>&nbsp;
            </td>
            <td>
             <?php echo $form->textField($model,'fuel_consumed',array('size'=>20)); ?>
                <?php echo $form->error($model,'fuel_consumed'); ?>
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
                <?php echo $form->labelEx($model,Yii::t('transport','Amount'), array('style'=>'float:left')); ?> <span class="required">*</span>
            </td>
            <td>&nbsp;
            </td>
            <td>
             <?php echo $form->textField($model,'amount',array('size'=>20)); ?>
                <?php echo $form->error($model,'amount'); ?>
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
                <?php echo $form->labelEx($model,Yii::t('transport','consumed_date')); ?>
            </td>
            <td>&nbsp;
            </td>
            <td>
            <?php //echo $form->textField($model,'admission_date');
			$settings=UserSettings::model()->findByAttributes(array('user_id'=>Yii::app()->user->id));
	if($settings!=NULL)
	{
		$date=$settings->dateformat;
		
		
	}
	else
	$date = 'dd-mm-yy';	
				$this->widget('zii.widgets.jui.CJuiDatePicker', array(
								//'name'=>'Students[admission_date]',
								'model'=>$model,
								'attribute'=>'consumed_date',
								// additional javascript options for the date picker plugin
								'options'=>array(
									'showAnim'=>'fold',
									'dateFormat'=>$date,
									'changeMonth'=> true,
									'changeYear'=>true,
									'yearRange'=>'1900:'
								),
								'htmlOptions'=>array(
									'style'=>'height:20px;'
								),
							));
		 ?>
                <?php echo $form->error($model,'consumed_date'); ?>
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

<?php } ?>
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save',array('class'=>'formbut')); ?>
		
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->