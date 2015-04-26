<style type="text/css">
.formCon input[type="text"], input[type="password"], textArea, select{ width:150px !important;}
</style>

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
 <table width="96%" border="0" cellspacing="0" cellpadding="0" class="s_search">
          <tr>
            	<td width="30%"><strong><?php echo Yii::t('transport','Name');?></strong></td>
            	<td width="2%">&nbsp;</td>
            	<td width="11%"><strong><?php echo Yii::t('transport','Route');?></strong></td>
            	<td width="3%">&nbsp;</td>
            	<td width="55%"><strong><?php echo Yii::t('transport','Stop');?></strong></td>
               
          </tr>
          <tr>
				<td><div style="position:relative; width:162px;"> <?php  $this->widget('zii.widgets.jui.CJuiAutoComplete',
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
                        	<td>&nbsp;</td>
                        </tr>
                        <tr>
                         <td><?php echo CHtml::submitButton(Yii::t('transport', 'Search'),array('name'=>'search','class'=>'formbut')); ?></td>  
                         </tr>
                         </table>
                         </div>
                         </div>
                         <?php
						 if(isset($list))
						 {
							echo ' <h3>'.Yii::t('transport','Search Results').'</h3>';
							
								?>
                                <div class="pdtab_Con" style="padding:0px;">
                               <table width="100%" cellpadding="0" cellspacing="0" border="0">
   								 <tr class="pdtab-h">
       
      								 <td align="center"><?php echo Yii::t('transport','Student Name');?></td>
      								 <td align="center"><?php echo Yii::t('transport','Route');?></td>
        							<td align="center"><?php echo Yii::t('transport','Stop');?></td>
                                     <td align="center"><?php echo Yii::t('transport','Action');?></td>
        					</tr>
                                <?php
								if($list==NULL)
									{
									 echo '<tr><td align="center" colspan="4"><strong>'.Yii::t('transport','No such student is using the transport facility.').'</strong></td></tr>';
								}
								else
								{
									foreach($list as $list_1)
									{
										$student=Students::model()->findByAttributes(array('id'=>$list_1->student_id));
										$stopdetails=StopDetails::model()->findByAttributes(array('id'=>$list_1->stop_id));
										$routedetails=RouteDetails::model()->findByAttributes(array('id'=>$stopdetails->route_id));
										?>
                                    <tr>
                                    	<td align="center"><?php echo $student->last_name.' '.$student->first_name;?> </td>
                                       <td align="center"><?php echo $routedetails->route_name;?></td>
                                        <td align="center"><?php echo $stopdetails->stop_name;?></td>
                                        <td align="center"><?php echo CHtml::link('Edit',array('/transport/transportation/reallot','id'=>$list_1->id)).' | '.CHtml::link('Remove',array('/transport/transportation/remove','id'=>$list_1->id),array('confirm'=>'Are you sure?'));?></td>
                                    </tr>
                                        <?php
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