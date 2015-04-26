<?php
$this->breadcrumbs=array(
	'Registrations'=>array('/hostel'),
	'Mess Change',
);
?>
<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'registration-form',
	'enableAjaxValidation'=>false,
)); ?>


<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="247" valign="top">
    <?php $this->renderPartial('/settings/hostel_left');?>
 </td>
    <td valign="top"> 
    <div class="cont_right">
    <h1><?php echo Yii::t('hostel','Mess Manage');?></h1>
    <div class="formCon" >
<div class="formConInner"> 
<?php
        $student_id= $_REQUEST['id'];
        $stud=Students::model()->findByAttributes(array('id'=>$_REQUEST['id'])); 
        $name=$stud->last_name.' '.$stud->first_name;
        $register=Registration::model()->findByAttributes(array('student_id'=>$_REQUEST['id']));
        $rid=$register->id; 
        $food=$register->food_preference;
        $foodinfo=FoodInfo::model()->findByAttributes(array('id'=>$food));
		$food_preference=$foodinfo->food_preference;
?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
 <td ><?php echo '<td><strong>'.CHtml::label(Yii::t('hostel','Name')).'</strong></td><td>'; ?></td>
    <td>&nbsp;</td>
    <td width="82%" ><input type="text" name="name" value="<?php echo $name;?>" readonly="readonly"></td>
    <td><input type="text" name="id" value="<?php echo $student_id;?>" hidden="hidden"></td>
    </tr>
    
    <tr>
    	<td colspan="4">&nbsp;</td>
    
    </tr>
    
    <tr>
      <td>  
       
<?php  
echo '<td><strong>'.CHtml::label(Yii::t('hostel','Food Preference')).'</strong></td><td>';?></td>
<td>&nbsp;</td>
<td><?php echo CHtml::dropDownList('food_preference','',CHtml::listData(FoodInfo::model()->findAll(),'id','food_preference'),array('prompt'=>$food_preference,'id'=>'food_preference','style'=>'width:146px')).'</td>';	

?>
</td>
<td></td>
  </tr>
  
</table>
</div>
<div style="padding:0 0 10px 20px">
	<?php echo CHtml::button(Yii::t('hostel','Save'), array('submit' => array('Registration/Messchange','id'=>$rid),'class'=>'formbut')); ?>
	</div></div>
</div>
</td>
</tr>
</table>
<?php $this->endWidget(); ?>

</div><!-- form -->

