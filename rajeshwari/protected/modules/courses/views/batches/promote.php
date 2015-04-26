<?php
$this->breadcrumbs=array(
	Yii::t('Batch','Batches')=>array('/courses'),
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
    <h1><?php echo Yii::t('Batch','Promote Batch');?></h1>
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
                      	<td><strong><?php echo Yii::t('Batch','Select Batch'); ?></strong></td>
                        <td><?php 
						//$data1 = CHtml::listData(Batches::model()->findAll(array('order'=>'name ASC', 'condition'=>'course_id=:x AND is_deleted=0', 'params'=>array(':x'=>$batch->course_id))),'id','name');
						$data1 = CHtml::listData(Batches::model()->findAll(array('order'=>'name ASC', 'condition'=>'is_deleted=0')),'id','coursename');
                          echo CHtml::dropDownList('batch_id','',$data1,array('prompt'=>Yii::t('Batch','Select'),'id'=>'batch_id1')); ?></td>
                        <td>&nbsp;</td>
                        <td><?php echo CHtml::submitButton(Yii::t('Batch','Promote'),array('name'=>'promote','id'=>'1','class'=>'add','confirm'=>Yii::t('Batch','Are you sure you want to save?'),'class'=>'formbut')); ?></td>
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
	 if(Yii::app()->user->getFlash('sid') or Yii::app()->user->getFlash('bid'))
	 {
	?>
    <div>
    <?php
	 	if(Yii::app()->user->hasFlash('sid'))
		{
        	echo Yii::app()->user->getFlash('sid').'<br/>';
		}
   		if(Yii::app()->user->hasFlash('bid'))
		{
   
        	echo Yii::app()->user->getFlash('bid');
		}
		?>
        </div>
      <?php
	 }
	 ?>
     
    </div>
    <div class="clear"></div>
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
					echo '<br><div class="notifications nt_red" style="padding-top:10px"><i>'.Yii::t('Batch','No Active Students In This Batch').'</i></div>'; 
									
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
					 echo '<div class="notifications nt_red">'.'<i>'.Yii::t('Batch','Nothing Found!').'</i></div>'; 
					 echo '</div>';
					
				}
                ?>
    </td>
  </tr>
</tbody></table>
</div>
