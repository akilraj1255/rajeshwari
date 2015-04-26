<style>
.formCon input[type="text"], input[type="password"], textArea, select {padding:6px 3px 6px 3px; width:140px;}
.exp_but { right:-11px; margin:0px 2px !important;}
</style>

<?php
$this->breadcrumbs=array(
	'Rooms'=>array('/hostel'),
	'RoomChange',
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
    <h1><?php echo Yii::t('hostel','Change Room');?></h1>
     <div class="formCon" >
<div class="formConInner">
  <div onclick="hide('studentname')" style="cursor:pointer;"></div>
	 <div id="studentname" style="display:block;" >
     <div style="position:relative; width:180px;">
      <?php  $this->widget('zii.widgets.jui.CJuiAutoComplete',
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
						 ?>
        <?php echo CHtml::hiddenField('student_id','',array('id'=>'id_widget')); ?>
		<?php echo CHtml::ajaxLink('',array('/site/explorer','widget'=>'1'),array('update'=>'#explorer_handler'),array('id'=>'explorer_student_name','class'=>'exp_but'));?></div>
        	 <?php echo '<br/><br/>'. CHtml::submitButton( Yii::t('hostel','Search'),array('name'=>'search','class'=>'formbut')); ?>   
     </div>
     </div>
     </div>
 	 <?php
 		 if(isset($list))
			{
				
		?>
        		<div class="pdtab_Con" style="padding:0px;">
   	 			<table width="100%" cellpadding="0" cellspacing="0" border="0">
					<tr class="pdtab-h">
						<td align="center"><?php echo Yii::t('hostel','Student Name');?></td>
                         <td align="center"><?php echo Yii::t('hostel','Hostel');?></td>
                        <td align="center"><?php echo Yii::t('hostel','Floor');?></td>
						<td align="center"><?php echo Yii::t('hostel','Room No');?></td>
						<td align="center"><?php echo Yii::t('hostel','Bed');?></td>
						<td align="center"><?php echo Yii::t('hostel','Action');?></td>
					</tr>
			<?php
					if($list==NULL)
					{
						echo '<tr><td align="center" colspan="6"><strong>'.Yii::t('hostel','Sorry!!&nbsp;No data available now..').'</strong></td></tr>';
					}
					else
					{
						foreach($list as $list_1)
							{
								if($list_1->student_id!=NULL)
								{
									$student=Students::model()->findByAttributes(array('id'=>$list_1->student_id));
									$floordetails=Floor::model()->findByAttributes(array('id'=>$list_1->floor));
									$hostel=Hosteldetails::model()->findByAttributes(array('id'=>$floordetails->hostel_id));
	
				?>
   					 <tr>
   							 <td align="center"><?php
										if($student!=NULL)
											{
												echo $student->last_name.' '.$student->first_name;
											}
	
									 ?></td>
                                  <td align="center"><?php echo $hostel->hostel_name;?></td>
                                 <td align="center"><?php echo $floordetails->floor_no;?></td>
   			 					<td align="center"><?php echo $list_1->room_no;?></td>
    							<td align="center"><?php echo $list_1->bed_no;?></td>
    							<td align="center"><?php echo CHtml::link(Yii::t('hostel','Change Room'),array('/hostel/room/change','id'=>$list_1->student_id));?></td>
    					</tr>
   						 <?php
								}
							}
						?>
       			 </table>
                 </div>
    			<?php
				}
		}
  
 	 ?>    
     </div>
         </td>
         </tr>
         </table>
          
    <?php $this->endWidget(); ?>