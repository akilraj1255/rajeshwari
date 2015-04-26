<?php
$this->breadcrumbs=array(
	Yii::t('os_sms_module','Contact Groups')=>array('index'),
	$model->id,
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
    						<h1><?php echo Yii::t('os_sms_module','View ContactGroups')." #".$model->id;?></h1>
							<?php $this->widget('zii.widgets.CDetailView', array(
								'data'=>$model,
								'attributes'=>array(
									'id',
									'group_name',
									'created_by',
									'created_at',
									'status',
								),
							)); ?>
                            
                            <?php echo CHtml::link(Yii::t('os_sms_module','Edit'), array('/mailbox/contactgroups/update', 'id'=>$model->id));?>
                            <?php echo CHtml::link(Yii::t('os_sms_module','View All'), array('/mailbox/contactgroups'));?>                            
                        </div>
                    </td>
                </tr>
            </tbody></table>
        </td>
    </tr>
</table>
