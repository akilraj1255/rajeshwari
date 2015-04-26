<?php
$this->breadcrumbs=array(
	'Transportations'=>array('/transport'),
	'Settings',
);?>
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'book-form',
	'enableAjaxValidation'=>false,
)); ?>
 
   <table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="247" valign="top">

 
 </td>
  <td valign="top">
   <div align="left">
   <?php
   echo CHtml::link(Yii::t('transport','Add Vehicle Details'),array('/VehicleDetails/create')).'&nbsp;&nbsp'.CHtml::link(Yii::t('transport','Add Route Details'),array('/RouteDetails/create')).'&nbsp;&nbsp'.CHtml::link(Yii::t('transport','Add Driver Details'),array('/DriverDetails/create'));
   ?>
   </div>
  </td>
 </tr>
 </table>                     

 <?php $this->endWidget(); ?>