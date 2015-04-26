
    
  <?php
$this->breadcrumbs=array(
	'Import CSV'=>array('/importcsv'),
	'Parent Users',
);


?>
<?php $form=$this->beginWidget('CActiveForm', array(
                                'method'=>'post',
                                )); ?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="247" valign="top">
    <?php $this->renderPartial('/default/left_side');?>
    </td>
    <td valign="top">
    <div class="cont_right formWrapper">
    <!--<div class="searchbx_area">
    <div class="searchbx_cntnt">
    	<ul>
        <li><a href="#"><img src="images/search_icon.png" width="46" height="43" /></a></li>
        <li><input class="textfieldcntnt"  name="" type="text" /></li>
        </ul>
    </div>
    
    </div>-->
 
    <div class="clear"></div>
    <div class="emp_right_contner">
     <?php if(Yii::app()->user->hasFlash('success')):?>
    <div class="info" style="color:#C30; width:575px; height:30px">
        <?php echo Yii::app()->user->getFlash('success'); ?>
    </div>
    <?php endif; ?>
    <?php if(Yii::app()->user->hasFlash('error')):?>
    <div class="info" style="color:#C30; width:575px; height:30px">
        <?php echo Yii::app()->user->getFlash('error'); ?>
    </div>
    <?php endif; ?>
    <div class="emp_tabwrapper">
    <div class="emp_tab_nav">
    	<?php $this->renderPartial('/default/emp_tab_nav');?>
    </div>
    <div class="clear"></div>
    <div class="emp_cntntbx" >
  	<?php
	$parentlist = Guardians::model()->findAll(array('condition'=>'uid=:x','params'=>array(':x'=>0),'limit'=>'1000','order'=>'id ASC'));
	?>
   <div align="center" style="font-size:16px; font-style:bold; padding:10px 0px;">
   <?php if(count($parentlist)!=0){echo Yii::t('importcsv','You have not created user accounts for').count($parentlist).'         parents   '.CHtml::submitButton(Yii::t('importcsv','Create Now'),array('confirm'=>'Are you sure?','name'=>'parentuser','value'=>'Create Now','class'=>'formbut'));}else { echo Yii::t('importcsv','No data available'); }?>
   
   </div>
    </div>
    </div>
    
    </div>
    </div>
   
    </td>
  </tr>
</table>
<?php $this->endWidget(); ?>