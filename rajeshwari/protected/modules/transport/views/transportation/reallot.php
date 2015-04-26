<?php
$this->breadcrumbs=array(
	'Transportations'=>array('/transport'),
	'Search',
);?>
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
     <h1><?php echo Yii::t('transport','Search');?></h1>
     <div class="formCon" >
<div class="formConInner">
 <table width="90%" border="0" cellspacing="0" cellpadding="0" class="s_search">
          <tr>
            	<td width="24%"><strong><?php echo Yii::t('transport','Name');?></strong></td>
            	<td width="2%">&nbsp;</td>
            	<td width="11%"><strong><?php echo Yii::t('transport','Route');?></strong></td>
            	<td width="3%">&nbsp;</td>
            	<td width="55%"><strong><?php echo Yii::t('transport','Stop');?></strong></td>
               
          </tr>
          <tr>
				<td> <?php echo $form->textField($model,'student_id',array('size'=>20)); ?></td>
                         <td>&nbsp;</td>
                         <td>
                          <?php echo CHtml::dropDownList('route','',CHtml::listData(RouteDetails::model()->findAll(),'id','route_name'),array('prompt'=>'Select',
'ajax' => array(
	'type'=>'POST',
	'url'=>CController::createUrl('/transport/transportation/routes'),
	'update'=>'#stop_id',
	'data'=>'js:$(this).serialize()',)));?></td>
    <td>&nbsp;</td>
						<td> <?php 

//$data = CHtml::listData(RouteDetails::model()->findAll(array('order'=>'route_name DESC')),'id','route_name');

/*echo 'Route';
echo CHtml::dropDownList('route_id','',$data,
array('prompt'=>'Select',
'ajax' => array(
'type'=>'POST',
'url'=>CController::createUrl('/transport/transportation/routes'),
'update'=>'#stop_id',
'data'=>'js:$(this).serialize()'
))); */


//$data1 = CHtml::listData(StopDetails::model()->findAll(array('order'=>'stop_name DESC')),'id','stop_name');
echo CHtml::activeDropDownList($model,'stop_id',array(),array('prompt'=>'Select','id'=>'stop_id')); ?></td>
						 
						 
						 
						 
						 
						 
						 <?php 
						// echo CHtml::dropDownList('route_id','',CHtml::listData(RouteDetails::model()->findAll(),'id','route_name'),array('prompt'=>'Select','id'=>'stopid'));
						 //echo CHtml::activeDropDownList($model,'room_no',CHtml::listData(RouteDetails::model()->findAll(),'id','route_name'),array('prompt'=>'Select')); ?>
                     
                        <td>&nbsp;</td>
                        <td><?php 
						// echo CHtml::dropDownList('stop_id','',CHtml::listData(StopDetails::model()->findAll(),'id','stop_name'),array('prompt'=>'Select','id'=>'stopid'));?></td>
                        </tr>
                        <tr>
                         <td><?php echo CHtml::submitButton(Yii::t('transport', 'Save'),array('name'=>'save','class'=>'formbut')); ?></td>  
                         </tr>
                         </table>
                         </div>
                         </div>
                      
                         </div>
                         
                         </td>
                         </tr>
                         </table>

 <?php $this->endWidget(); ?>