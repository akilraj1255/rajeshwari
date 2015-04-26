<?php
$this->breadcrumbs=array(
	'Driver Details'=>array('/transport'),
	'Assign',
);

?>
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'book-form',
	'enableAjaxValidation'=>false,
)); ?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="247" valign="top">
    <?php $this->renderPartial('/transportation/trans_left');?>
 </td>
    <td valign="top"> 
    <div class="cont_right">
     <h1><?php echo Yii::t('transport','Assign Route');?></h1>
     <div class="formCon" >
<div class="formConInner">
 <table width="90%" border="0" cellspacing="0" cellpadding="0" class="s_search">
          <tr>
            	<td><strong><?php echo Yii::t('transport','Select Driver');?></strong></td>
            	<td>&nbsp;</td>
            	<td><strong><?php echo Yii::t('transport','Select Vehicle');?></strong></td>
            	<td>&nbsp;</td>
          </tr>
          
          <tr>
                <td><?php echo CHtml::dropDownList('driver_id','',CHtml::listData(DriverDetails::model()->findAll('status IS NULL'),'id','last_name'),array('prompt'=>'Select'));?></td>
                <td>&nbsp;</td>
                <td><?php echo CHtml::dropDownList('vehicle_id','',CHtml::listData(VehicleDetails::model()->findAll('status IS NULL'),'id','vehicle_code'),array('prompt'=>'Select'));?></td>
                <td>&nbsp;</td>
		</tr>
        <tr>
          	<td colspan="4">&nbsp;</td>
          </tr>
        <tr>
        	<td><?php echo CHtml::submitButton( Yii::t('transport','Assign'),array('name'=>'search','class'=>'formbut')); ?></td>
        </tr>
 </table>
  </div>
 </div>
 <?php
 if(isset($id) && $id!=NULL)
 {
	$drive=DriverDetails::model()->findByAttributes(array('id'=>$id));
	$route=RouteDetails::model()->findByAttributes(array('vehicle_id'=>$drive->vehicle_id));
	?>
     <div class="pdtab_Con" style="padding:0px;">
     <table width="100%" border="0" cellspacing="0" cellpadding="0">
   								 <tr class="pdtab-h">
       
      								  <td align="center"><?php echo Yii::t('transport','Driver Name');?></td>
      								  <td align="center"><?php echo Yii::t('transport','Date Of Birth');?></td>
        							  <td align="center"><?php echo Yii::t('transport','Vehicle Code');?></td>
                                      <td align="center"><?php echo Yii::t('transport','Route');?></td>
                                      
        							  
    							</tr>
                                 <tr>
                                	  <td align="center"><?php echo $drive->last_name.' '.$drive->first_name;?></td>
      								  <td align="center"><?php 
									  			$settings=UserSettings::model()->findByAttributes(array('user_id'=>Yii::app()->user->id));
											if($settings!=NULL)
												{	
												$date1=date($settings->displaydate,strtotime($drive->dob));
												
		
											}
									  		echo $date1;?></td>
        							  <td align="center"><?php echo $drive->vehicle_id;?></td>
                                      <td align="center"><?php if($route!=NULL)echo $route->route_name;?></td>
                               
                                </tr>
      </table>
    <?php
 }
 
 ?>
</div>
 </div>
 </td>
 </tr>
 </table>
        <?php $this->endWidget(); ?>