<style>
.formCon input[type="text"], input[type="password"], textArea, select {padding:6px 3px 6px 3px; width:140px;}
.exp_but { right:-11px; margin:0px 2px !important;}
</style>
<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'registration-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>
<div class="formCon" >
<div class="formConInner">
<table width="60%" border="0" cellspacing="0" cellpadding="0">
 <tr>
    <td><?php echo $form->labelEx($model,Yii::t('hostel','Select Hostel')); ?></td>
    <td>&nbsp;</td>
    <td><?php echo CHtml::dropDownList('hostel','',CHtml::listData(Hosteldetails::model()->findAll('is_deleted=:x',array(':x'=>'0')),'id','hostel_name'),array('prompt'=>'Select',
'ajax' => array(
	'type'=>'POST',
	'url'=>CController::createUrl('/hostel/room/allot'),
	'update'=>'#floorid',
	'data'=>'js:$(this).serialize()',)));?>
		</td>
  </tr>

  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
   <tr>
    <td><?php echo $form->labelEx($model,Yii::t('hostel','Select Floor')); ?></td>
    <td>&nbsp;</td>
    <td><?php echo CHtml::dropDownList('floor','',array(),array('prompt'=>'Select','id'=>'floorid'));?>
	
		</td>
  </tr>

  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>


  <tr> 
    <td><?php echo $form->labelEx($model,Yii::t('hostel','student_id')); ?></td>
    <td>&nbsp;</td>
    <td><div style="position:relative; width:180px" ><?php 
	   if($model->isNewRecord)
	   {
				$this->widget('zii.widgets.jui.CJuiAutoComplete',
						array(
						  'name'=>'name',
						  'id'=>'name_widget',
						  'source'=>$this->createUrl('/site/autocomplete'),
						  'htmlOptions'=>array('placeholder'=>'Student Name'),
						  'options'=>
							 array(
								   'showAnim'=>'fold',
								   'select'=>"js:function(student, ui) {
									  $('#id_widget').val(ui.item.id);
									 
											 }"
									),
					
						));
		
		 }
	     else
			{
				  $this->widget('zii.widgets.jui.CJuiAutoComplete',
						array(
						  'model'=>$model,
						  'name'=>'name',
						  'id'=>'name_widget',
						   'attribute'=>'student_id',
						  'source'=>$this->createUrl('/site/autocomplete'),
						  'htmlOptions'=>array('placeholder'=>'Student Name'),
						  'options'=>
							 array(
								   'showAnim'=>'fold',
								   'select'=>"js:function(student, ui) {
									  $('#id_widget').val(ui.item.id);
									 
											 }"
									),
					
						));
			}
						 ?>
        <?php echo CHtml::hiddenField('student_id','',array('id'=>'id_widget')); ?>
		<?php echo CHtml::ajaxLink('',array('/site/explorer','widget'=>'1'),array('update'=>'#explorer_handler'),array('id'=>'explorer_student_name','class'=>'exp_but'));?></div></td>
  </tr>
    <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><?php echo $form->labelEx($model,Yii::t('hostel','food_preference')); ?></td>
    <td>&nbsp;</td>
    <td><?php echo $form->dropDownList($model,'food_preference',CHtml::listData(FoodInfo::model()->findAll(),'id','food_preference'),array('prompt'=>'Select')); ?>
		<?php //echo $form->error($model,'food_preference'); ?></td>
  </tr>
    <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><?php echo $form->labelEx($model,Yii::t('hostel','Description')); ?></td>
    <td>&nbsp;</td>
    <td><?php echo $form->textField($model,'desc',array('size'=>20)); ?>
		<?php echo $form->error($model,'desc'); ?></td>
  </tr>

  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  
</table>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ?  Yii::t('hostel','Create') : Yii::t('hostel','Save'),array('class'=>'formbut')); ?>
	</div>
</div>
</div>
<?php $this->endWidget(); ?>

</div><!-- form -->