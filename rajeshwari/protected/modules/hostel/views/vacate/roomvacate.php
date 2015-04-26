<style>
.formCon input[type="text"], input[type="password"], textArea, select {padding:6px 3px 6px 3px; width:140px;}
.exp_but { right:-11px; margin:0px 2px !important;}
</style>
<?php
$this->breadcrumbs=array(
	'Vacates'=>array('/hostel'),
	'Manage',
)?>;
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'vacate-form',
	'enableAjaxValidation'=>false,
)); ?>
<?php
//echo '<strong>'.CHtml::label('Room No','').'</strong>&nbsp;&nbsp;';
//echo CHtml::dropDownList('BedNo','',CHtml::listData(Allotment::model()->findAll('status=:x',array(':x'=>'C')),'bed_no','bed_no'),array('prompt'=>'Select','id'=>'bed_no','submit'=>array('Vacate/create')));	
?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="247" valign="top">
    <?php $this->renderPartial('/settings/hostel_left');?>
 </td>
    <td valign="top"> 
    <div class="cont_right">
    <h1><?php echo Yii::t('hostel','Vacate Room');?></h1>
    <div class="formCon" >
<div class="formConInner"> 
<table width="40%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="100%"><strong><?php echo Yii::t('hostel','Name');?></strong></td>
    <td>&nbsp;</td>
   </tr><tr>
    <td><div id="studentname" style="display:block;">
    <div style="position:relative; width:180px" >
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
		<?php echo CHtml::ajaxLink('',array('/site/explorer','widget'=>'1'),array('update'=>'#explorer_handler'),array('id'=>'explorer_student_name','class'=>'exp_but'));?></div></td>
           </div>
           
           </td>
           
  </tr>
</table>
<div style="padding-top:20px;"><?php echo CHtml::submitButton( 'Search',array('name'=>'search','class'=>'formbut')); ?></div>
           </div>
           </div>
           <?php
		   if(isset($list))
			{
				?>
             <h3><?php echo Yii::t('hostel','Search Results');?></h3>
             
       	 <?php
				
				
		   	?>
            <div class="pdtab_Con" style="padding:0px;">
           			<table width="100%" cellpadding="0" cellspacing="0" border="0" >
					<tr class="pdtab-h">
					<td align="center"><?php echo Yii::t('hostel','Student name');?></td>
                     <td align="center"><?php echo Yii::t('hostel','Hostel');?></td>
                     <td align="center"><?php echo Yii::t('hostel','Floor');?></td>
					<td align="center"><?php echo Yii::t('hostel','Room No');?></td>
					<td align="center"><?php echo Yii::t('hostel','Bed');?></td>
					<td align="center"><?php echo Yii::t('hostel','Mess');?></td>
					</tr>
            <?php
			if($list==NULL)
				{
					echo '<tr><td align="center" colspan="6"><strong>'.Yii::t('hostel','OOPS!!&nbsp;Its an invalid search.Try again..').'</strong></td></tr>';
				}
				else
				{
					foreach($list as $list_1)
					{
						if($list_1->student_id!=NULL)
						{
						$student=Students::model()->findByAttributes(array('id'=>$list_1->student_id));
						$mess=MessFee::model()->findByAttributes(array('student_id'=>$list_1->student_id,'status'=>'C'));
						$floordetails=Floor::model()->findByAttributes(array('id'=>$list_1->floor));
						$hostel=Hosteldetails::model()->findByAttributes(array('id'=>$floordetails->hostel_id));
	
			?>
            	  <tr>
   			 			<td align="center"><?php
			
								echo $student->last_name.' '.$student->first_name;
	
						 ?></td>
                               <td align="center"><?php echo $hostel->hostel_name;?></td>
                               <td align="center"><?php echo $floordetails->floor_no;?></td>
             				 <td align="center"><?php echo $list_1->room_no;?></td>
   			 				<td align="center"><?php echo $list_1->bed_no;?></td>
    						<td align="center"><?php 
									if($mess->is_paid=='0')
									{
											echo Yii::t('hostel','Not Paid').'<br>'.CHtml::link(Yii::t('hostel','[Pay Now]'),array('/hostel/messmanage/payfees','id'=>$list_1->student_id));
									}
											else if($mess->is_paid=='1')
									{
											echo Yii::t('hostel','No dues').'<br>'.CHtml::link(Yii::t('hostel','[Vacate]'),array('/hostel/vacate/create','id'=>$list_1->student_id));
									}
									?></td>
    							 </tr>
           				
        				 <?php
						}
					}
							?>
                              </table></div>
                              <?php
				}
			}
			
		 ?>  
         </div>
         </td>
         </tr>
         </table>
<?php $this->endWidget(); ?>
