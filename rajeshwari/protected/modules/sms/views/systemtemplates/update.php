<?php
$this->breadcrumbs=array(
	Yii::t('os_sms_module','Sms'),
	Yii::t('os_sms_module','System Generated Templates')=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	Yii::t('os_sms_module','Update')
);
?>

<table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
        <td width="247" valign="top" id="port-left">    
        	<?php $this->renderPartial('/default/left_side');?>    
        </td>
        <td valign="top">  
        <?php $this->renderPartial('_tab');?>      
        	<table width="100%" cellspacing="0" cellpadding="0" border="0">
                <tbody><tr>
                    <td width="75%" valign="top">
                    	<div style="padding-left:20px;" class="sms-block">
    						<h1><?php echo Yii::t('os_sms_module','Update System Generated Template');?></h1>
							<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
                            
                            <div class="clear"></div>
                                                        
                        </div>
                    </td>
                </tr>
            </tbody></table>
        </td>
    </tr>
</table>