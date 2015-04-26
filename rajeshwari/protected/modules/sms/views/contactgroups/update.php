<?php
$this->breadcrumbs=array(
	Yii::t('os_sms_module','SMS'),
	Yii::t('os_sms_module','Contact Groups')=>array('index'),
	$model->id,
	Yii::t('os_sms_module','Update'),
);
?>

<table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
        <td width="247" valign="top" id="port-left">    
        	<?php $this->renderPartial('/default/left_side');?>    
        </td>
        <td valign="top">        
        	<table width="100%" cellspacing="0" cellpadding="0" border="0">
                <tbody><tr>
                    <td width="75%" valign="top">
                    	<div style="padding-left:20px;" class="sms-block">
    						<h1><?php echo Yii::t('os_sms_module','Update Contact Group');?></h1>
                            <div style="position:relative;">
                                <div class="contrht_bttns" style="right: 17px; top: -37px;">
                                    <ul>
                                        <li>
                                            <?php echo CHtml::link('<span>'.Yii::t('os_sms_module','All Groups').'</span>', array('/sms/contactgroups'));?>
                                        </li>
                                    </ul>
                                </div>
                            </div>
							<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
                            
                            <div class="clear"></div>
                            
                        </div>
                    </td>
                </tr>
            </tbody></table>
        </td>
    </tr>
</table>
