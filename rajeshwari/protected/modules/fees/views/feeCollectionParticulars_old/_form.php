<script language="javascript">
function admission_1(){
	$('#admission').show();
	$('#category').hide();
}

function student_1(){
	$('#category').show();
	$('#admission').hide();
}
function all_1()
{
	$('#category').hide();
	$('#admission').hide();
}

</script>
<div class="formCon" style="width:60%">

<div class="formConInner">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'fee-collection-particulars-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note"><?php echo Yii::t('fees','Fields with'); ?> <span class="required">*</span> <?php echo Yii::t('fees','are required.') ; ?></p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'description'); ?>
		<?php echo $form->textArea($model,'description',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'description'); ?>
	</div>


	<div class="row">
   
    <input type="radio" name="all" value="all" id="all" checked="checked" onclick="all_1();"/> <?php echo Yii::t('fees','All'); ?><br />
    
    <input type="radio" name="all" value="admission" id="admi" onclick="admission_1();" /><?php echo Yii::t('fees','Admission No.'); ?><br />
  
      <input type="radio" name="all" value="student" id="stu" onclick="student_1();"  /><?php echo Yii::t('fees','Student Category'); ?> <br />
	
    </div>


	<div class="row" >
		<?php //echo $form->labelEx($model,'finance_fee_collection_id'); ?>
		<?php echo $form->hiddenField($model,'finance_fee_collection_id',array('value'=>$_REQUEST['id'])); ?>
		<?php echo $form->error($model,'finance_fee_collection_id'); ?>
	</div>

	<div class="row" id="category" style="display:none;">
		<?php echo $form->labelEx($model,'student_category_id'); ?>
		<?php 
		$data = CHtml::listData(StudentCategories::model()->findAll(), 'id', 'name');
		echo $form->dropDownlist($model,'student_category_id',$data,array('empty'=>'Select')); ?>
		<?php echo $form->error($model,'student_category_id'); ?>
	</div>

	<div class="row" id="admission" style="display:none;">
		<?php echo $form->labelEx($model,'admission_no'); ?>
		<?php echo $form->textField($model,'admission_no',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'admission_no'); ?>
	</div>
    <div class="row">
		<?php echo $form->labelEx($model,'amount'); ?>
		<?php echo $form->textField($model,'amount',array('size'=>12,'maxlength'=>12)); ?>
		<?php echo $form->error($model,'amount'); ?>
	</div>

	<div class="row" style="display:none;">
		<?php echo $form->labelEx($model,'student_id'); ?>
		<?php echo $form->textField($model,'student_id'); ?>
		<?php echo $form->error($model,'student_id'); ?>
	</div>

	<div class="row">
		<?php //echo $form->labelEx($model,'is_deleted'); ?>
		<?php echo $form->hiddenField($model,'is_deleted'); ?>
		<?php echo $form->error($model,'is_deleted'); ?>
	</div>

	<div class="row">
		<?php //echo $form->labelEx($model,'created_at'); ?>
		<?php echo $form->hiddenField($model,'created_at'); ?>
		<?php echo $form->error($model,'created_at'); ?>
	</div>

	<div class="row">
		<?php //echo $form->labelEx($model,'updated_at'); ?>
		<?php echo $form->hiddenField($model,'updated_at'); ?>
		<?php echo $form->error($model,'updated_at'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ?  Yii::t('fees','Submit') : Yii::t('fees','Save')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
</div>