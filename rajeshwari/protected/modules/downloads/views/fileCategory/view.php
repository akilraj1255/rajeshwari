<?php
$this->breadcrumbs=array(
	'File Categories'=>array('admin'),
	$model->id,
);

?>


<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="80" valign="top" id="port-left">
     <?php $this->renderPartial('/default/left_side');?>
    
    </td>
    <td valign="top">
    <div class="inner_new_head">
        <?php echo Yii::t('downloads','View File Category'); ?>
    </div>
    <div class="inner_new_table">         
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
        <th> <?php echo Yii::t('downloads','ID'); ?></th>
        <th> <?php echo Yii::t('downloads','Category'); ?></th>
        <th> <?php echo Yii::t('downloads','Created At'); ?></th>
        
        </tr>
        <tr>
        <td><?php echo $model->id; ?></td>
        <td><?php echo $model->category; ?></td>
        <td><?php echo $model->created_at; ?></td>
        
        </tr>
        </table>
        
    </div>
    </td>
  </tr>
</table>