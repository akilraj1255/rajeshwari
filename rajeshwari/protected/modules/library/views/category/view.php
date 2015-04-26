<?php
$this->breadcrumbs=array(
	'Categories'=>array('/library'),
	'View',
);

?>



<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="247" valign="top">
   <?php $this->renderPartial('/settings/library_left');?>
 </td>
    <td valign="top">
    <div style="padding-left:10px">
<h1><?php echo Yii::t('library','View Category');?></h1></div> 
    <div class="cont_right">
		<?php
        $cat=Category::model()->findByAttributes(array('cat_id'=>$_REQUEST['id']));
        ?>
         <div class="pdtab_Con">
        <table width="100%" cellpadding="0" cellspacing="0" border="0"  >
            <tr class="pdtab-h">
                <th align="center" height="20px"><?php echo Yii::t('library','Category');?></th>
            </tr>
            <tr>
                <td align="center"><?php echo $cat->cat_name;?></td>
            </tr>
        </table>
        </div>
    </div>
	</td>
	</tr>
</table>

