<!--
 * Ajax Crud Administration Form
 * FinanceFeeCollections *
 * InfoWebSphere {@link http://libkal.gr/infowebsphere}
 * @author  Spiros Kabasakalis <kabasakalis@gmail.com>
 * @link http://reverbnation.com/spiroskabasakalis/
 * @copyright Copyright &copy; 2011-2012 Spiros Kabasakalis
 * @since 1.0
 * @ver 1.3
 -->
<div id="finance-fee-collections_form_con" class="client-val-form">
    <?php if ($model->isNewRecord) : ?>    <h3 id="create_header"><?php echo Yii::t('fees','Create New FinanceFeeCollections'); ?></h3>
    <?php  elseif (!$model->isNewRecord):  ?>    <h3 id="update_header"><?php echo Yii::t('fees','Update FinanceFeeCollections'); ?> <?php  echo
        $model->id;  ?>  </h3>
    <?php   endif;  ?>
    <?php      $val_error_msg = Yii::t('fees','Error.FinanceFeeCollections was not saved.');
    $val_success_message = ($model->isNewRecord) ?
            Yii::t('fees','FinanceFeeCollections was created successfuly.') :
            Yii::t('fees','FinanceFeeCollections  was updated successfuly.');
  ?>

    <div id="success-note" class="notification success png_bg"
         style="display:none;">
        <a href="#" class="close"><img
                src="<?php echo Yii::app()->request->baseUrl.'/js_plugins/ajaxform/images/icons/cross_grey_small.png';  ?>"
                title="Close this notification" alt="close"/></a>
        <div>
            <?php   echo $val_success_message;  ?>        </div>
    </div>

    <div id="error-note" class="notification errorshow png_bg"
         style="display:none;">
        <a href="#" class="close"><img
                src="<?php echo Yii::app()->request->baseUrl.'/js_plugins/ajaxform/images/icons/cross_grey_small.png';  ?>"
                title="Close this notification" alt="close"/></a>
        <div>
            <?php   echo $val_error_msg;  ?>        </div>
    </div>

    <div id="ajax-form"  class='form'>
<?php   $formId='finance-fee-collections-form';
   $actionUrl =
   ($model->isNewRecord)?CController::createUrl('financeFeeCollections/ajax_create')
                                                                 :CController::createUrl('financeFeeCollections/ajax_update');


    $form=$this->beginWidget('CActiveForm', array(
     'id'=>'finance-fee-collections-form',
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
            <?php echo $form->labelEx($model,'name'); ?>
            <?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>255)); ?>
        <span id="success-FinanceFeeCollections_name"
              class="hid input-notification-success  success png_bg right"></span>
        <div>
            <small></small>
        </div>
            <?php echo $form->error($model,'name'); ?>
    </div>

        <div class="row">
            <?php echo $form->labelEx($model,'start_date'); ?>
            <?php echo $form->textField($model,'start_date'); ?>
        <span id="success-FinanceFeeCollections_start_date"
              class="hid input-notification-success  success png_bg right"></span>
        <div>
            <small></small>
        </div>
            <?php echo $form->error($model,'start_date'); ?>
    </div>

        <div class="row">
            <?php echo $form->labelEx($model,'end_date'); ?>
            <?php echo $form->textField($model,'end_date'); ?>
        <span id="success-FinanceFeeCollections_end_date"
              class="hid input-notification-success  success png_bg right"></span>
        <div>
            <small></small>
        </div>
            <?php echo $form->error($model,'end_date'); ?>
    </div>

        <div class="row">
            <?php echo $form->labelEx($model,'due_date'); ?>
            <?php echo $form->textField($model,'due_date'); ?>
        <span id="success-FinanceFeeCollections_due_date"
              class="hid input-notification-success  success png_bg right"></span>
        <div>
            <small></small>
        </div>
            <?php echo $form->error($model,'due_date'); ?>
    </div>

        <div class="row">
            <?php echo $form->labelEx($model,'fee_category_id'); ?>
            <?php echo $form->textField($model,'fee_category_id'); ?>
        <span id="success-FinanceFeeCollections_fee_category_id"
              class="hid input-notification-success  success png_bg right"></span>
        <div>
            <small></small>
        </div>
            <?php echo $form->error($model,'fee_category_id'); ?>
    </div>

        <div class="row">
            <?php echo $form->labelEx($model,'batch_id'); ?>
            <?php echo $form->textField($model,'batch_id'); ?>
        <span id="success-FinanceFeeCollections_batch_id"
              class="hid input-notification-success  success png_bg right"></span>
        <div>
            <small></small>
        </div>
            <?php echo $form->error($model,'batch_id'); ?>
    </div>

        <div class="row">
            <?php echo $form->labelEx($model,'is_deleted'); ?>
            <?php echo $form->textField($model,'is_deleted'); ?>
        <span id="success-FinanceFeeCollections_is_deleted"
              class="hid input-notification-success  success png_bg right"></span>
        <div>
            <small></small>
        </div>
            <?php echo $form->error($model,'is_deleted'); ?>
    </div>

    
    <input type="hidden" name="YII_CSRF_TOKEN"
           value="<?php echo Yii::app()->request->csrfToken; ?>"/>

    <?php  if (!$model->isNewRecord): ?>    <input type="hidden" name="update_id"
           value=" <?php echo $model->id; ?>"/>
    <?php endif; ?>
    <div class="row buttons">
        <?php   echo CHtml::submitButton($model->isNewRecord ? Yii::t('fees','Submit') : Yii::t('fees','Save'),array('class' =>
        'button align-right')); ?>    </div>

  <?php  $this->endWidget(); ?></div>
    <!-- form -->

</div>
<script type="text/javascript">

    //Close button:

    $(".close").click(
            function () {
                $(this).parent().fadeTo(400, 0, function () { // Links with the class "close" will close parent
                    $(this).slideUp(600);
                });
                return false;
            }
    );


</script>


