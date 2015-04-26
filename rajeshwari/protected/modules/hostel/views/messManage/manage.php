<?php
$this->breadcrumbs=array(
	'Mess Manages'=>array('/hostel'),
	'Manage',
);
?>
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'vacate-form',
	'enableAjaxValidation'=>false,
)); ?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="247" valign="top">
    <?php $this->renderPartial('/settings/hostel_left');?>
 </td>
    <td valign="top"> 
    <div class="cont_right">
    <h1><?php echo Yii::t('hostel','Student Details');?></h1>
    <div class="formCon" >
<div class="formConInner"> 
<table width="50%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    
<?php
echo '<td><strong>'.CHtml::label(Yii::t('hostel','Student ID'),'').'</strong></td><td>';
echo CHtml::dropDownList('studentid','',CHtml::listData(Allotment::model()->findAll('status=:x',array(':x'=>'S')),'student_id','studentadm'),array('prompt'=>'Select','id'=>'student_id','submit'=>array('MessManage/messdetails'))).'</td>';	
?>
  </tr>
</table>
</div>
</div>
</div>
</td>
</tr>
</table>
<?php $this->endWidget(); ?>
