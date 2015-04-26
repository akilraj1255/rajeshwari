 
<style>
.formConInner{width:auto;}
</style>
 
 
 <?php
$this->breadcrumbs=array(
	'Rooms'=>array('/hostel'),
	'RomList',
);?>
 <?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'student-form',
	'enableAjaxValidation'=>false,
)); ?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="247" valign="top">
    <?php $this->renderPartial('/settings/hostel_left');?>
 </td>
    <td valign="top"> 
    <div class="cont_right">
    <h1><?php echo Yii::t('hostel','Allot Room');?></h1>
 <div class="formCon" >
<div class="formConInner">
 		<?php
		if(isset($_REQUEST['id']) && (isset($_REQUEST['floor_id'])))
		{
			$floordetails=Floor::model()->findByAttributes(array('id'=>$_REQUEST['floor_id']));
			$room=Room::model()->findAllByAttributes(array('floor'=>$_REQUEST['floor_id']));
			//$hostel=Hosteldetails::model()->findByAttributes(array('id'=>$floordetails->hostel_id));?>
			
            <div class="pdtab_Con" style="padding-top:0px;">
                             <table width="100%" cellpadding="0" cellspacing="0" border="0" >
							<tr class="pdtab-h">
								<td align="center"><?php echo Yii::t('hostel','Floor');?></td>
								<td align="center"><?php echo Yii::t('hostel','Room No');?></td>
								<td align="center"><?php echo Yii::t('hostel','Bed');?></td>
								<td align="center"><?php echo Yii::t('hostel','Action');?></td>

							</tr>
            <?php
			if($room!=NULL)
			{
			foreach($room as $room_1)
			{
				$list=Allotment::model()->findAllByAttributes(array('room_no'=>$room_1->id,'status'=>'C'));
				foreach($list as $list_1)
				{
					?>
                     <tr>
   								 <td align="center"><?php echo $floordetails->floor_no;
							 ?></td>
  								  <td align="center"><?php echo $list_1->room_no;?></td>
    							  <td align="center"><?php echo $list_1->bed_no;?></td>
    								<td align="center"><?php echo CHtml::link(Yii::t('hostel','Allot'),array('/hostel/allotment/create','studentid'=>$_REQUEST['id'],'allotid'=>$list_1->id,'floor_id'=>$_REQUEST['floor_id']));?></td>
  							  </tr>
                    <?php
				}
			}
			}
			else
			{
				echo '<tr><td colspan = "4" align="center">Sorry!! the requested room is not available</td></tr>';
			}
		}
		?>
        </table>
         </div>
           </div>
           </div>
           </div>
           </td>
           </tr>
           </table>
 		
    <?php $this->endWidget(); ?>