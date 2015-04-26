<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'allotment-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>
<?php
if((Yii::app()->controller->action->id)=='create')
{
$bed_no_1= '';
$floor_no='';
	if(isset($_REQUEST['id']) && (!isset($_REQUEST['bed_no'])))
	{
		$bed_no	= RoomDetails::model()->findAll('status=:x ORDER BY id ASC',array(':x'=>'C'));
		if($bed_no==NULL)
			{
				
				$bed_no_1 = '';
				$floor_no='';
				
				
			}
			else
			{
			$bed_no_1=$bed_no[0]['bed_no'];
			$floor_no=$bed_no[0]['no_of_floors'];
			}
	}
	else if(isset($_REQUEST['id']) && (isset($_REQUEST['bed_no'])))
	{
		$room=RoomDetails::model()->findByAttributes(array('bed_no'=>$_REQUEST['bed_no']));
		$floor_no=$room->no_of_floors;
		$bed_no_1=$_REQUEST['bed_no'];
	}
}

?>
	<div class="row">
    
   		 <?php echo $form->labelEx($model,'Floor'); ?>
         <?php echo CHtml::dropDownList('floor','',CHtml::listData(Floor::model()->findAll(),'id','floor_no'),array('prompt'=>'Select',
	'ajax' => array(
	'type'=>'POST',
	'url'=>CController::createUrl('/room/allot'),
	'update'=>'#bed',
	'data'=>'js:$(this).serialize()',)));?>
    </div>
    <div class="row">
    <?php echo CHtml::dropDownList('bed_no','',array(),array('prompt'=>'Select','id'=>'bed'));?>
		
	</div>
	<?php /*?><div class="row">
		<?php echo $form->labelEx($model,'Bed no'); ?>
		<?php echo $form->textField($model,'bed_no',array('size'=>20,'value'=>$bed_no_1)); ?>
		<?php echo $form->error($model,'bed_no'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Floor'); ?>
		<?php echo $form->textField($model,'floor',array('size'=>20,'value'=>$floor_no)); ?><?php */?>
        <?php echo $form->hiddenField($model,'created',array('value'=>date('Y-m-d'))); ?>
		<?php echo $form->error($model,'floor'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->