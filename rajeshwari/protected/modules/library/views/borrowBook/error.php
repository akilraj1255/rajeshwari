<?php
$this->breadcrumbs=array(
	'Rooms'=>array('/hostel'),
	'Manage',
);
?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="247" valign="top">
    <?php $this->renderPartial('/settings/library_left');?>
 </td>
    <td valign="top"> 
    <div class="cont_right">
<?php
 echo '<strong>'.Yii::t('hostel','Sorry!!&nbsp;No book is available now.').'</strong>&nbsp;';
 echo '<strong>'.Yii::t('hostel','Click Here to view the').' </strong> &nbsp;&nbsp;'. CHtml::link(Yii::t('library','Book Details'),array('/library/book/manage'));
 
 ?>
 </div>
 </td>
 </tr>
 </table>