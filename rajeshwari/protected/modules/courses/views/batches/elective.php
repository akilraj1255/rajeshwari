<style>
.infored_bx{
	padding:5px 20px 7px 20px;
	background:#e44545;
	color:#fff;
	-moz-border-radius:4px;
	-webkit-border-radius:4px;
	border-radius:4px;
	font-size:15px;
	font-style:italic;
	text-shadow: 1px -1px 2px #862626;
	text-align:left;
}
.infogreen_bx{
	padding:5px 20px 7px 20px;
	background:#59bd5f;
	color:#fff;
	-moz-border-radius:4px;
	-webkit-border-radius:4px;
	border-radius:4px;
	font-size:15px;
	font-style:italic;
	text-shadow: 1px -1px 2px #46974b;
	text-align:left;
}
</style>
<?php
$this->breadcrumbs=array(
	Yii::t('Batch','Courses')=>array('/courses'),
	Yii::t('Batch','Promote'),
);
?>
<?php $batch=Batches::model()->findByAttributes(array('id'=>$_REQUEST['id'])); ?>
          
<div style="background:#FFF; min-height:800px;">
<table width="100%" cellspacing="0" cellpadding="0" border="0">
  <tbody><tr>
  
    <td  valign="top">
	<?php if($batch!=NULL)
		   {
			   ?>
   <div style="padding:20px;">
    <h1><?php echo Yii::t('Batch','Elective');?></h1>
    <!--<div class="searchbx_area">
    <div class="searchbx_cntnt">
    	<ul>
        <li><a href="#"><img src="images/search_icon.png" width="46" height="43" /></a></li>
        <li><input class="textfieldcntnt"  name="" type="text" /></li>
        </ul>
    </div>
    
    </div>-->
    
  
        
    <!--<div class="edit_bttns">
    <ul>
    <li>
    <a href="#" class=" edit last">Edit</a>    </li>
    </ul>
    </div>-->
    
    
    <div class="clear"></div>
    <div class="emp_right_contner">
    <div class="emp_tabwrapper">
     <?php $this->renderPartial('tab');?>
     <?php $this->beginWidget('CActiveForm') ?>
    <div class="formCon" style="margin-bottom:10px; position:relative;margin-top:10px;">
            	<div class="formConInner">
                	<table width="42%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                      	<td><strong><?php echo Yii::t('Batch','Select Group'); ?></strong></td>
                        <td><?php 
						//$data1 = CHtml::listData(ElectiveGroups::model()->findAll('batch_id=:cid and is_deleted=:x',array(':cid'=>$_REQUEST['id'],':x'=>0)),'id','name');
						$data1 = CHtml::listData(ElectiveGroups::model()->findAll(array('order'=>'name ASC','condition'=>'batch_id=:cid and is_deleted=:x','params'=>array(':cid'=>$_REQUEST['id'],':x'=>0))),'id','name');
						
						echo CHtml::dropDownList('elective_group_id','',$data1,array('prompt'=>Yii::t('Batch','Select'),
					'ajax' => array(
					'type'=>'POST',
					'url'=>CController::createUrl('/courses/electives/electivename'),
					'update'=>'#elective_id',
					'data'=>'js:$(this).serialize()',),'style'=>'width:270px;'));
						
						
						
						
                         // echo CHtml::dropDownList('elective_id','',$data1,array('prompt'=>'Select','id'=>'elective_id1')); ?></td>
                        <td>&nbsp;</td>
                        
                      </tr>
                      <tr>
                      	<td><strong><?php echo Yii::t('Batch','Select Subject'); ?></strong></td>
                        <td><?php 
                          
						  echo CHtml::dropDownList('elective_id','',$data,array('prompt'=>'Select','id'=>'elective_id'));
						  
						 ?></td>
                        <td>&nbsp;</td>
                        <td><?php echo CHtml::submitButton(Yii::t('Batch','Save'),array('name'=>'elective','id'=>'1','class'=>'add','confirm'=>Yii::t('Batch','Are you sure you want to save?'),'class'=>'formbut')); ?></td>
                      </tr>
                    </table>

                </div>
                <div class="edit_bttns" style="top:15px; right:20px">
    <ul>
  
    <li> <?php echo CHtml::ajaxLink('<span>'.Yii::t('Batch','Add New Batch').'</span>',$this->createUrl('batches/Addnew'),array(
        'onclick'=>'$("#jobDialog").dialog("open"); return false;',
        'update'=>'#jobDialog','type' =>'GET','data' => array( 'val1' =>$batch->course_id ),'dataType' => 'text'),array('id'=>'showJobDialog1','class'=>'addbttn last')); ?></li>
        <li></li>
                  </ul>
    <div class="clear"></div>
    </div>
            </div>
   
 
    <!--<div class="c_subbutCon" align="right" style="width:100%">
    <div class="c_cubbut" style="width:120px;">
    <ul>
    <li>
    <?php /*?><?php echo CHtml::link('Add Student', array('/students/students/create'),array('class'=>'addbttn last'));?><?php */?>
    </li>
    </ul>
    <div class="clear"></div>
    </div>
    </div>-->
    
   <?php
            if(Yii::app()->user->hasFlash('success')){
			?>
            <div class="infogreen_bx" style="margin:10px 0 10px 10px; width:575px;"><?php echo Yii::app()->user->getFlash('success');?></div>
            <?php
			}
			else if(Yii::app()->user->hasFlash('error')){
			?>
            <div class="infored_bx" style="margin:10px 0 10px 10px; width:575px;"><?php echo Yii::app()->user->getFlash('error');?></div>
            <?php
			}
			?>
    <div class="table_listbx1" >
    
     <?php
                if(isset($_REQUEST['id']))
                {
                $posts=Students::model()->findAll("batch_id=:x and is_deleted=:y and is_active=:z", array(':x'=>$_REQUEST['id'],':y'=>'0',':z'=>'1'));
				if($posts!=NULL)
				{
                ?>
                <div class="pdtab_Con" style="padding-top:0px;">
                    <table width="100%" cellspacing="0" cellpadding="0" border="0">
                    <tr class="pdtab-h">
                    <td >&nbsp;</td>
                    <td style="padding-left:20px;"><?php echo Yii::t('Batch','Student Name');?></td>
                    <td style="padding-left:20px;"><?php echo Yii::t('Batch','Admission Number');?></td>  
                    </tr>
                   <tr>
                    <td colspan="3" style="padding:8px 0 8px 20px;" >
                    <?php $posts1=CHtml::listData($posts, 'id', 'Fullname');?>
					<?php
					echo CHtml::checkBoxList('sid','',$posts1, array('id'=>'1','template' => '{input}{label}</td></tr><tr><td width="10%" style="padding:0 0 10px 20px;" class="rbr">','checkAll' => 'All')); ?>
                     </td>
                      <td>&nbsp;</td>
                       <td>&nbsp;</td>
                        </tr>
						
                            
                    </table>
                    </div>
                   
                    
                <?php    	
                }
				else
				{
					echo '<br><div class="notifications nt_red" style="padding-top:10px">'.Yii::t('Batch','<i>No Active Students In This Batch</i>').'</div>'; 
									
				}
				
				}
                ?>
    
    			 
   
   
 <?php $this->endWidget(); ?>
 <div id="jobDialog">
    </div>

    </div>
    
    
    </div>
    
    </div>
    </div>
   
     <?php    	
                }
				else
				{
					 echo '<div class="emp_right" style="padding-left:20px; padding-top:50px;">';
					 echo '<div class="notifications nt_red">'.'<i>'.Yii::t('Batch','Nothing Found!!').'</i></div>'; 
					 echo '</div>';
					
				}
                ?>
    </td>
  </tr>
</tbody></table>
</div>
