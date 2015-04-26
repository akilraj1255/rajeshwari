<script src="<?php echo Yii::app()->request->baseUrl; ?>/css/jquery.maskedinput-1.3.js" type="text/javascript"></script>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'stop-details-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>
    <?php
	$route=RouteDetails::model()->findByAttributes(array('id'=>$_REQUEST['id']));
	if($route!=NULL)
	{
		if(isset($_REQUEST['stops'])){
			$cnt=$_REQUEST['stops'];
		}
		else{
			$cnt=$route->no_of_stops;
		}
		for($i=0;$i<$cnt;$i++)
		{
	?>
	<table width="80%" border="0" cellspacing="0" cellpadding="0">
       
        <tr>
            <td>
                <?php echo $form->labelEx($model,Yii::t('transport','stop_name')); ?><span class="required">*</span>
            </td>
            <td>&nbsp;
            </td>
            <td>
                <?php echo $form->textField($model,'stop_name[]',array('size'=>20)); ?>
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
                <?php echo $form->labelEx($model,Yii::t('transport','fare')); ?><span class="required">*</span>
            </td>
            <td>&nbsp;
            </td>
            <td>
                <?php echo $form->textField($model,'fare[]',array('size'=>20)); ?>
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
                <?php echo $form->labelEx($model,Yii::t('transport','arrival_mrng')); ?><span class="required">*</span>
            </td>
            <td>&nbsp;
            </td>
            <td>
            	 <?php //echo $form->textField($model,'arrival_mrng[]',array('size'=>20)); ?>
				 <?php 
                    /*$this->widget('ext.timepicker.timepicker', array(
						 'model'=>$model,
						 'name'=>'arrival_mrng',
						 'select'=> 'time',
						 'options'=>array(
							'dateFormat'=>'',
							'timeFormat'=>'hh:mm',
						),
					));*/
                ?>
                <?php
				
				$this->widget('application.extensions.jui_timepicker.JTimePicker', array(
				 'model'=>$model,
				 'id'=>'arrival_mrng'.$i,
				 'attribute'=>'arrival_mrng[]',
				 'name'=>'arrival_mrng[]',
				 'options'=>array(
					 'showPeriod'=>true,
					 'showPeriodLabels'=> true,
					 'showCloseButton'=> true,       
					'closeButtonText'=> 'Done',     
					'showNowButton'=> true,        
					'nowButtonText'=> 'Now',        
					'showDeselectButton'=> true,   
					'deselectButtonText'=> 'Deselect' 
        			 ),
  				 ));
				
				?>
                
                
                
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
                <?php echo $form->labelEx($model,Yii::t('transport','arrival_evng')); ?><span class="required">*</span>
            </td>
            <td>&nbsp;
            </td>
            <td>
            	<?php
				/*$this->widget('application.extensions.timepicker.timepicker', array(
					'model'=>$model,
					'name'=>'arrival_evng',
					'select'=> 'time',
					'options'=>array(
						'dateFormat'=>'',
						'timeFormat'=>'hh:mm',
					),
				));*/
				?>
                <?php //echo $form->textField($model,'arrival_evng[]',array('size'=>20)); ?>
                <?php
				
				$this->widget('application.extensions.jui_timepicker.JTimePicker', array(
				 'model'=>$model,
				 'id'=>'arrival_evng'.$i,
				 'attribute'=>'arrival_evng['.$i.']',
				 'name'=>'arrival_evng['.$i.']',
				 'options'=>array(
					 'showPeriod'=>true,
					 'showPeriodLabels'=> true,
					 'showCloseButton'=> true,       
					'closeButtonText'=> 'Done',     
					'showNowButton'=> true,        
					'nowButtonText'=> 'Now',        
					'showDeselectButton'=> true,   
					'deselectButtonText'=> 'Deselect' 
        			 ),
  				 ));
				
				?>
                <?php echo $form->error($model,'arrival_evng'); ?>
            </td>
        </tr>
        <tr>
        	<td colspan="3">&nbsp;
            </td>
        </tr>
        <tr>
        	<td colspan="3">&nbsp;
            </td>
        </tr>
        <tr>
        	<td colspan="3">&nbsp;
            </td>
        </tr>
      <?php } ?> 
       <?php /*?> <tr>
            <td>
                <?php echo $form->labelEx($model,'Departure'); ?>
            </td>
            <td>&nbsp;
            </td>
            <td>
                <?php echo $form->textField($model,'departure_mrng',array('size'=>20)); ?>
                <?php echo $form->error($model,'departure_mrng'); ?>
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
                <?php echo $form->labelEx($model,'Departure'); ?>
            </td>
            <td>&nbsp;
            </td>
            <td>
                <?php echo $form->textField($model,'departure_evng',array('size'=>20)); ?>
                <?php echo $form->error($model,'departure_evng'); ?>
            </td>
        </tr>
        <tr>
        	<td>&nbsp;
            </td>
            <td>&nbsp;
            </td>
            <td>&nbsp;
            </td>
        </tr><?php */?>
         <tr>
            <td>
                <?php echo $form->labelEx($model,Yii::t('transport','route_id')); ?>
            </td>
            <td>&nbsp;
            </td>
            <td>
                <?php echo $form->textField($model,'route_id',array('value'=>$_REQUEST['id'])); ?>
                <?php echo $form->error($model,'route_id'); ?>
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
   <?php } ?>
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->