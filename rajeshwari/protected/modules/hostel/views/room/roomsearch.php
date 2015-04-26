<style>
.formCon input[type="text"], input[type="password"], textArea, select {padding:6px 3px 6px 3px; width:140px;}
.exp_but { right:-11px; margin:0px 2px !important;}
</style>

<?php
$this->breadcrumbs=array(
	'Rooms'=>array('/hostel'),
	'RoomSearch',
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
     <h1><?php echo Yii::t('hostel','Search Rooms');?></h1>
     <div class="formCon">
     <div class="formConInner">
     <table width="90%" border="0" cellspacing="0" cellpadding="0" class="s_search">
          <tr>
            	<td width="29%"><strong><?php echo Yii::t('hostel','Name');?></strong></td>
            	<td width="2%">&nbsp;</td>
            	<td width="11%"><strong>&nbsp;</strong></td>
            	<td width="3%">&nbsp;</td>
            	<td width="55%"><strong><?php echo Yii::t('hostel','Room');?></strong></td>
          </tr>
          <tr>
            	<td><div style="position:relative;">
                <table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td> <?php 
		$this->widget('zii.widgets.jui.CJuiAutoComplete',
						array(
						  'name'=>'name',
						  'id'=>'name_widget',
						  'source'=>$this->createUrl('/site/autocomplete'),
						  'htmlOptions'=>array('placeholder'=>'Student Name'),
						  'options'=>
							 array(
								   'showAnim'=>'fold',
								   'select'=>"js:function(student, ui) {
									  $('#id_widget').val(ui.item.id);
									 
											 }"
									),
					
						));
	
						 ?></td>
    <td> <?php echo CHtml::hiddenField('student_id','',array('id'=>'id_widget')); ?>
		<?php echo CHtml::ajaxLink('',array('/site/explorer','widget'=>'1'),array('update'=>'#explorer_handler'),array('id'=>'explorer_student_name','class'=>'exp_but'));?></td>
  </tr>
</table>

                
       </div></td>
                <!-- <input type="text" name="studentname"  style="width:130px;"/>-->
            	<td>&nbsp;</td>
           		 <td><?php //echo CHtml::activeDropDownList($model,'floor',CHtml::listData(Floor::model()->findAll(),'id','floor_no'),array('prompt'=>'Select')); ?></td>
           		 <td>&nbsp;</td>
            	<td> <?php echo CHtml::activeDropDownList($model,'room_no',CHtml::listData(Room::model()->findAll(),'id','room_no'),array('prompt'=>'Select')); ?></td>
            	<td width="5%">&nbsp;</td>
          </tr>
          <tr>
            	<td><div style="margin-top:10px;"><?php echo CHtml::submitButton( Yii::t('hostel','Search'),array('name'=>'search','class'=>'formbut')); ?></div> </td>
          </tr>
       </table>
        </div>
            </div>
       <?php
			if(isset($list))
			{
		?>
             <h3><?php echo Yii::t('hostel','Search Results');?></h3>
             
        <?php
		?>					<div class="pdtab_Con" style="padding:0px;">
                    		<table width="100%" cellpadding="0" cellspacing="0" border="0">
								<tr class="pdtab-h">
									<td align="center"><?php echo Yii::t('hostel','Student name');?></td>
                                     <td align="center"><?php echo Yii::t('hostel','Hostel');?></td>
                                    <td align="center"><?php echo Yii::t('hostel','Floor');?></td>
                                    <td align="center"><?php echo Yii::t('hostel','Room No.');?></td>
									<td align="center"><?php echo Yii::t('hostel','Bed No.');?></td>
									
								</tr>
               		 			<?php
								
									if($list==NULL)
									{
									echo '<tr><td align="center" colspan="5"><strong>'.Yii::t('hostel','No student is using the hostel facility..').'</strong></td></tr>';
									}
									else
									{
										foreach($list as $list_1)
										{
											
											$student=Students::model()->findByAttributes(array('id'=>$list_1->student_id));
											$room=Room::model()->findByAttributes(array('id'=>$list_1->room_no));
											$floordetails=Floor::model()->findByAttributes(array('id'=>$room->floor));
											$hostel=Hosteldetails::model()->findByAttributes(array('id'=>$floordetails->hostel_id));
								?>
                				<tr>
                					<td align="center"><?php if($student!=NULL){ echo $student->last_name.' '.$student->first_name; } else
									{ echo 'Not allotted'; }?></td>
                                   <td align="center"><?php echo $hostel->hostel_name;?></td>
                                    <td align="center"><?php echo $floordetails->floor_no;?></td>
                					<td align="center"><?php echo $room->room_no;?></td>
                                    <td align="center"><?php echo $list_1->bed_no;?></td>
               						
               				 </tr>
                  			 <?php
										
										
									}
							}
							?>
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