<?php
$this->breadcrumbs=array(
	'Rooms'=>array('/hostel'),
	'change',
);
?>

<?php
 $roles=Rights::getAssignedRoles(Yii::app()->user->Id); // check for single role
					
						  foreach($roles as $role)
						  
						   if(sizeof($roles)==1 and $role->name == 'student')
						   {
							?>
      <?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'student-form',
	'enableAjaxValidation'=>false,
)); ?>
                               <div id="parent_Sect">
    <?php $this->renderPartial('/settings/studentleft');?>
    
    <div id="parent_rightSect">
        	<div class="parentright_innercon">
            	<h1>Change Room</h1>
              
                <div class="profile_details">
  <div id="studentname" style="display:block;">      	
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td valign="middle" width="20%"><?php echo '<strong>'.CHtml::label(Yii::t('hostel','Select Floor'),'').'</strong>';?> </td>
    <td>&nbsp;</td>
    <td valign="top" width="80%"><?php echo CHtml::activeDropDownList($model,'floor',CHtml::listData(Floor::model()->findAll(),'id','hostelname'),array('prompt'=>'Select')); ?></td>
  </tr>
  <tr>
     <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><?php echo CHtml::submitButton( Yii::t('hostel','Search'),array('name'=>'search','class'=>'formbut')); ?>   </td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
</div>
 <?php
  			if(isset($list))
			{
				
					if($list==NULL)
					{
						echo '<div align="center"><strong>'.Yii::t('hostel','Sorry!!&nbsp;No data available now..').'</strong></div>';
					}
					else
					{
			?>
            <table width="100%" cellpadding="0" cellspacing="0" border="0" >
							<tr class="pdtab-h">
								<td align="center"><?php echo Yii::t('hostel','Floor');?></td>
								<td align="center"><?php echo Yii::t('hostel','Room No');?></td>
								<td align="center"><?php echo Yii::t('hostel','Bed');?></td>
								<td align="center"><?php echo Yii::t('hostel','Action');?></td>

							</tr>
						<?php
							foreach($list as $list_1)
							{
								$floordetails=Floor::model()->findByAttributes(array('id'=>$list_1->floor));
								$allot=Allotment::model()->findAll('room_no=:x and status=:y',array(':x'=>$list_1->id,':y'=>'C'));
								if($allot!=NULL)
								{
									foreach ($allot as $allot_1)
									{
										?>
                                         <tr>
   								 <td align="center"><?php echo $floordetails->floor_no;
							 ?></td>
  								  <td align="center"><?php echo $allot_1->room_no;?></td>
    							  <td align="center"><?php echo $allot_1->bed_no;?></td>
    								<td align="center"><?php echo CHtml::link(Yii::t('hostel','Request'),array('/hostel/room/roomrequest','studentid'=>$_REQUEST['id'],'allotid'=>$allot_1->id,'floor'=>$_REQUEST['floor']),array('confirm'=>'Are you sure you want to request room change?'));?></td>
  							  </tr>
                                        <?php
									}
								}
												
							?>
   							
  						  <?php
											
									
							}
							?>
   		 <?php
			}
		}
  
 		 ?> 
         </table>
</div>



 	</div>
    
     <div class="clear"></div> 
     </div>
     <div class="clear"></div> 
    </div>
     <?php $this->endWidget(); ?>                          <?php } else { ?>
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
 <div id="studentname" style="display:block;">
 <table width="50%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td valign="middle"><?php echo '<strong>'.CHtml::label(Yii::t('hostel','Select Floor'),'').'</strong>';?> </td>
    <td>&nbsp;</td>
    <td valign="top"><?php echo CHtml::activeDropDownList($model,'floor',CHtml::listData(Floor::model()->findAll(),'id','hostelname'),array('prompt'=>'Select')); ?></td>
  </tr>
  <tr>
     <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><?php echo CHtml::submitButton( Yii::t('hostel','Search'),array('name'=>'search','class'=>'formbut')); ?>   </td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
  </div>
         </div>
           </div>
 		 <?php
  			if(isset($list))
			{
				
					if($list==NULL)
					{
						echo '<div align="center"><strong>'.Yii::t('hostel','Sorry!!&nbsp;No data available now..').'</strong></div>';
					}
					else
					{
			?>
   							 <div class="pdtab_Con" style="padding-top:0px;">
                             <table width="100%" cellpadding="0" cellspacing="0" border="0" >
							<tr class="pdtab-h">
								<td align="center"><?php echo Yii::t('hostel','Floor');?></td>
								<td align="center"><?php echo Yii::t('hostel','Room No');?></td>
								<td align="center"><?php echo Yii::t('hostel','Bed');?></td>
								<td align="center"><?php echo Yii::t('hostel','Action');?></td>

							</tr>
						<?php
							foreach($list as $list_1)
							{
								$floordetails=Floor::model()->findByAttributes(array('id'=>$list_1->floor));
								$allot=Allotment::model()->findAll('room_no=:x and status=:y',array(':x'=>$list_1->id,':y'=>'C'));
								if($allot!=NULL)
								{
									foreach ($allot as $allot_1)
									{
										?>
                                         <tr>
   								 <td align="center"><?php echo $floordetails->floor_no;
							 ?></td>
  								  <td align="center"><?php echo $allot_1->room_no;?></td>
    							  <td align="center"><?php echo $allot_1->bed_no;?></td>
    								<td align="center"><?php echo CHtml::link(Yii::t('hostel','Allot'),array('/hostel/allotment/create','studentid'=>$_REQUEST['id'],'allotid'=>$allot_1->id,'floor_id'=>$list_1->floor));?></td>
  							  </tr>
                                        <?php
									}
								}
								//echo count($allot);
							//	exit;
								//	$room=Room::model()->findByAttributes(array('id'=>$list_1->room_no));
									
					
												
							?>
   							
  						  <?php
											
									
							}
							?>
   		 <?php
			}
		}
  
 		 ?> 
         </table>
         </div>
         </div>
       
         
         </td>
         </tr>
         </table> 
          <?php $this->endWidget(); ?>
         <?php } ?>       
   