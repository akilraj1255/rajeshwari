<?php
$this->breadcrumbs=array(
	'Floors'=>array('/hostel'),
	'Create',
);

?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="247" valign="top">
    <?php $this->renderPartial('/settings/hostel_left');?>
 </td>
    <td valign="top"> 
    <div class="cont_right">
<h1><?php echo Yii::t('hostel','Create Floor');?></h1>
<?php
    Yii::app()->clientScript->registerScript(
       'myHideEffect',
       '$(".error").animate({opacity: 1.0}, 3000).fadeOut("slow");',
       CClientScript::POS_READY
    );
	?>
	<?php
		//////////////////////////////////
		if(Yii::app()->user->hasFlash('errorMessage')): ?>
    <div class="error" style="background:#FFF; color:#C00; padding-left:200px;">
        <?php echo Yii::app()->user->getFlash('errorMessage'); ?>
    </div>
    <?php endif;
		
		/////////////////////////////////
	?>
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
</div>
</td>
</tr>
</table>