
<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'weekdays-form',
	'enableAjaxValidation'=>true,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>
    
	<div class="row">
		
        <?php 
		

$data = CHtml::listData(Courses::model()->findAll(array('order'=>'course_name DESC')),'id','course_name');

echo Yii::t('timetable','Course');
echo CHtml::dropDownList('cid','',$data,
array('prompt'=>'Select',
'ajax' => array(
'type'=>'POST',
'url'=>CController::createUrl('Weekdays/batch'),
'update'=>'#batch_id',
'data'=>'js:$(this).serialize()',
))); 
echo '&nbsp;&nbsp;&nbsp;';
echo Yii::t('timetable','Batch');

$data1 = CHtml::listData(Batches::model()->findAll(array('order'=>'name DESC')),'id','name');
echo CHtml::activeDropDownList($model,'batch_id',$data1,array('prompt'=>'Select','id'=>'batch_id')); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'weekday'); ?>
        
		<?php echo CHtml::checkBox('sunday','');?><?php echo Yii::t('timetable','Sunday');?>
        <?php echo CHtml::checkBox('Monday','');?><?php echo Yii::t('timetable','Monday');?>
        <?php echo CHtml::checkBox('Tuesday','');?><?php echo Yii::t('timetable','Tuesday');?>
        <?php echo CHtml::checkBox('Wednesday','');?><?php echo Yii::t('timetable','Wednesday');?>
        <?php echo CHtml::checkBox('Thursday','');?><?php echo Yii::t('timetable','Thursday');?>
        <?php echo CHtml::checkBox('Friday','');?><?php echo Yii::t('timetable','Friday');?>
        <?php echo CHtml::checkBox('Saturday','');?><?php echo Yii::t('timetable','Saturday');?>
		
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>


</div><!-- form -->