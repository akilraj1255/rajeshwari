
<?php
$this->breadcrumbs=array(
	'Stop Details'=>array('/transport'),
	'Create',
);

?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="247" valign="top">
    <?php $this->renderPartial('/transportation/trans_left');?>
 </td>
    <td valign="top"> 
    <div class="cont_right">
<h1><?php echo Yii::t('transport','StopDetails');?></h1>

<?php echo $this->renderPartial('_form_update', array('model'=>$model)); ?>
</div>
</td>
</tr>
</table>