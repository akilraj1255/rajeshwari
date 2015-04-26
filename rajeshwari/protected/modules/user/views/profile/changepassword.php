<?php $this->pageTitle=Yii::app()->name . ' - '.UserModule::t("Change Password");
$this->breadcrumbs=array(
	UserModule::t("Profile") => array('/user/profile'),
	UserModule::t("Change Password"),
);

?>
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'changepassword-form',
	'enableAjaxValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
)); ?>

<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="80" valign="top">
<div id="othleft-sidebar">
<?php $this->renderPartial('/default/left_side');?>
  </div>
 </td>
 <td valign="top">
 
 
<div class="cont_right formWrapper usertable">

 <div class="edit_bttns" style="top:15px; right:20px">
    <ul>
        <li>
            <?php echo CHtml::link('<span>View Profile</span>',array('/user/profile'),array('class'=>'addbttn last'));?>    
        </li>
        <li>
            <?php echo CHtml::link('<span>Edit Profile</span>',array('/user/profile/edit'),array('class'=>'addbttn last'));?>    
        </li>
    </ul>
    <div class="clear"></div>
</div>

<h1><?php echo UserModule::t('Change password'); ?></h1>
<?php if(Yii::app()->user->id != 1 && Yii::app()->user->id != 2 && Yii::app()->user->id != 3 && Yii::app()->user->id != 4 && Yii::app()->user->id != 5){
 ?>

<p class="note"><?php echo UserModule::t('Fields with <span class="required">*</span> are required.'); ?></p>
	<?php echo $form->errorSummary($model); ?>
    <div style="background:#FFF;">
<table class="detail-view">
	<tr>
		<th class="label"><?php echo $form->labelEx($model,Yii::t('user','oldPassword'),array('style'=>'color:#222222;')); ?></th>
	    <td><?php echo $form->passwordField($model,'oldPassword'); ?>
	<?php echo $form->error($model,'oldPassword'); ?></td>
	</tr>
	
	<tr>
		<th class="label"><?php echo $form->labelEx($model,Yii::t('user','password'),array('style'=>'color:#222222;')); ?></th>
    	<td><?php echo $form->passwordField($model,'password'); ?>
	<?php echo $form->error($model,'password'); ?>
	<p class="hint">
	<?php echo UserModule::t("Minimal password length 4 symbols."); ?>
	</p></td>
	</tr>
			
	<tr>
		<th class="label"><?php echo $form->labelEx($model,Yii::t('user','verifyPassword'),array('style'=>'color:#222222;')); ?></th>
    	<td><?php echo $form->passwordField($model,'verifyPassword'); ?>
	<?php echo $form->error($model,'verifyPassword'); ?></td>
	</tr>
	
</table>
<br/>
<div class="row submit">

	<?php echo CHtml::submitButton(UserModule::t("Save"),array('class'=>'formbut')); ?>
	</div>
</div>
<?php }
else {
	echo '<span style="color:#FF0000"> Feature is disabled for default users.</span>';
}?>
 </td>
  </tr>
</table>
</div>

	
	
<?php $this->endWidget(); ?>
<!-- form -->