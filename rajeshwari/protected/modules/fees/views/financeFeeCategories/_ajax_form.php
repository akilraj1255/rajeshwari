<style>
.fancybox-inner{ width:auto;}
.errorshow{display:none !important;}
.row_checkbox
{
	margin:0px;
	padding:0px;
}
.row_checkbox input[type="checkbox"]{ width:12px; height:12px;}
.row_checkbox br{ line-height:0px !important; height:0px !important;}
</style>
<!--
 * Ajax Crud Administration Form
 * FinanceFeeCategories *
 * InfoWebSphere {@link http://libkal.gr/infowebsphere}
 * @author  Spiros Kabasakalis <kabasakalis@gmail.com>
 * @link http://reverbnation.com/spiroskabasakalis/
 * @copyright Copyright &copy; 2011-2012 Spiros Kabasakalis
 * @since 1.0
 * @ver 1.3
 -->
<div id="finance-fee-categories_form_con" class="client-val-form">
    <?php if ($model->isNewRecord) : ?>    <h3 id="create_header"><?php echo Yii::t('fees','Create New Fee Categories');?></h3>
    <?php  elseif (!$model->isNewRecord):  ?>    <h3 id="update_header"><?php echo Yii::t('fees','Update');?></h3>
    <?php   endif;  ?>
    <?php      $val_error_msg = Yii::t('fees','Error.FinanceFeeCategories was not saved.');
    $val_success_message = ($model->isNewRecord) ?
            Yii::t('fees','Fee Categories was created successfuly.') :
            Yii::t('fees','Fee Categories  was updated successfuly.');
  ?>

    <div id="success-note" class="notification success"
         style="display:none;">
        <a href="#" class="close"><img
                src="<?php echo Yii::app()->request->baseUrl.'/js_plugins/ajaxform/images/icons/cross_grey_small.png';  ?>"
                title="Close this notification" alt="close"/></a>
        <div>
            <?php   echo $val_success_message;  ?>        </div>
    </div>

    <div id="error-note" class="notification errorshow"
         style="display:none;">
        <a href="#" class="close"><img
                src="<?php echo Yii::app()->request->baseUrl.'/js_plugins/ajaxform/images/icons/cross_grey_small.png';  ?>"
                title="Close this notification" alt="close"/></a>
        <div>
            <?php   echo $val_error_msg;  ?>        </div>
    </div>

    <div id="ajax-form"  class='form'>
<?php   $formId='finance-fee-categories-form';
   $actionUrl =
   ($model->isNewRecord)?CController::createUrl('financeFeeCategories/ajax_create')
                                                                 :CController::createUrl('financeFeeCategories/ajax_update');


    $form=$this->beginWidget('CActiveForm', array(
     'id'=>'finance-fee-categories-form',
    //  'htmlOptions' => array('enctype' => 'multipart/form-data'),
         'action' => $actionUrl,
    // 'enableAjaxValidation'=>true,
      'enableClientValidation'=>true,
     'focus'=>array($model,'name'),
     'errorMessageCssClass' => 'input-notification-error  error-simple png_bg',
     'clientOptions'=>array('validateOnSubmit'=>true,
                                        'validateOnType'=>false,
                                        'afterValidate'=>'$js_afterValidate',
                                        'errorCssClass' => 'err',
                                        'successCssClass' => 'suc',
                                        'afterValidate' => 'js:function(form,data,hasError){ $.js_afterValidate(form,data,hasError);  }',
                                         'errorCssClass' => 'err',
                                        'successCssClass' => 'suc',
                                        'afterValidateAttribute' => 'js:function(form, attribute, data, hasError){
                                                                                                 $.js_afterValidateAttribute(form, attribute, data, hasError);
                                                                                                                            }'
                                                                             ),
));

     ?>
    <?php echo $form->errorSummary($model, '
    <div style="font-weight:bold">Please correct these errors:</div>
    ', NULL, array('class' => 'errorsum notification errorshow png_bg')); ?>    <p class="note">Fields with <span class="required">*</span> are required.</p>


    <div class="row">
            <?php echo $form->labelEx($model,'name',array('style'=>'color:#222222')); ?>
            <?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>255)); ?>
        <span style="margin-top:0px; position: relative; right:0px; top:-23px;" id="success-FinanceFeeCategories_name"
              class="hid input-notification-success  success png_bg right"></span>
        <div>
            <small></small>
        </div>
            <?php echo $form->error($model,'name'); ?>
    </div>

        <div class="row">
            <?php echo $form->labelEx($model,'description'); ?>
            <?php echo $form->textArea($model,'description',array('rows'=>6, 'cols'=>50)); ?>
        <span id="success-FinanceFeeCategories_description"
              class="hid input-notification-success  success png_bg right"></span>
        <div>
            <small></small>
        </div>
            <?php echo $form->error($model,'description'); ?>
    </div>

        <div class="row_checkbox">
        
            <?php $data = CHtml::listData(Batches::model()->findAll("is_active=:x and is_deleted=:y", array(':x'=>1,':y'=>0)), 'id', 'Coursename');
     if (!$model->isNewRecord)
	 {
		 echo '<h3>'.Yii::t('fees','Batch').'</h3>';
		 $batch=Batches::model()->findByAttributes(array('id'=>$model->batch_id));
		 echo $batch->name;
		 
	 }
	 else
	 {
		 echo '<h3>'.Yii::t('fees','Select Batches').'</h3>';
		 
		 		echo '<div style="height:auto;width:450px;overflow-y:auto;line-height:0px;">';
        echo '<table>';
                echo $form->checkBoxList($model,'batch_id', $data,array( 'htmlOption'=>'style=clear:both','template' => '<tr><td>{input}</td><td>{label}</td></tr>','checkAll' => 'All'));        echo '</table>';
        echo '</div>'; 
	} ?>
        <span id="success-FinanceFeeCategories_batch_id"
              class="hid input-notification-success  success png_bg right"></span>
        <div>
            <small></small>
        </div>
            <?php echo $form->error($model,'batch_id'); ?>
    </div>

        <div class="row">
           <?php //echo $form->labelEx($model,'is_deleted'); ?>
		<?php echo $form->hiddenField($model,'is_deleted'); ?>
        <span id="success-FinanceFeeCategories_is_deleted"
              class="hid input-notification-success  success png_bg right"></span>
        <div>
            <small></small>
        </div>
            <?php echo $form->error($model,'is_deleted'); ?>
    </div>

        <div class="row">
           <?php //echo $form->labelEx($model,'is_master'); ?>
		<?php echo $form->hiddenField($model,'is_master',array('value'=>1)); ?>
        <span id="success-FinanceFeeCategories_is_master"
              class="hid input-notification-success  success png_bg right"></span>
        <div>
            <small></small>
        </div>
            <?php echo $form->error($model,'is_master'); ?>
    </div>

        <div class="row">
            <?php //echo $form->labelEx($model,'created_at'); ?>
		<?php echo $form->hiddenField($model,'created_at',array('value'=>date('Y-m-d'))); ?>
        <span id="success-FinanceFeeCategories_created_at"
              class="hid input-notification-success  success png_bg right"></span>
        <div>
            <small></small>
        </div>
            <?php echo $form->error($model,'created_at'); ?>
    </div>

        <div class="row">
           <?php //echo $form->labelEx($model,'updated_at'); ?>
		<?php echo $form->hiddenField($model,'updated_at',array('value'=>date('Y-m-d'))); ?>
        <span id="success-FinanceFeeCategories_updated_at"
              class="hid input-notification-success  success png_bg right"></span>
        <div>
            <small></small>
        </div>
            <?php echo $form->error($model,'updated_at'); ?>
    </div>

    
    <input type="hidden" name="YII_CSRF_TOKEN"
           value="<?php echo Yii::app()->request->csrfToken; ?>"/>

    <?php  if (!$model->isNewRecord): ?>    <input type="hidden" name="update_id"
           value=" <?php echo $model->id; ?>"/>
    <?php endif; ?>
    <div class="row buttons" style="width:30%;">
        <?php   echo CHtml::submitButton($model->isNewRecord ? Yii::t('fees','Submit') : Yii::t('fees','Save'),array('class' =>
        'formbut')); ?>    </div>

  <?php  $this->endWidget(); ?></div>
    <!-- form -->

</div>
<script type="text/javascript">

    //Close button:

    $(".close").click(
            function () {
                alert("click pressed!");
                $(this).parent().fadeTo(400, 0, function () { // Links with the class "close" will close parent
                    $(this).slideUp(600);
                });
                return false;
            }
    );


</script>


