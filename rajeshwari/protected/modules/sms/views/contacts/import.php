<?php
$this->breadcrumbs=array(
	Yii::t('os_sms_module','SMS'),
	Yii::t('os_sms_module','Contacts')=>array('index'),
	Yii::t('os_sms_module','Import'),
);
?>
<style>
span.error{
	color:#F00;
}
span.ok{
	color:#093;
}
</style>

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
                        
                        	<h1><?php echo Yii::t('os_sms_module','Import Contacts');?></h1>
                            <div class="formCon" style="width:96%">
<div class="formConInner">
                        	<div id="message_block"></div>
                            <div id="secondStep"></div>
                        	<div id="firstStep">
                            <div class="select_csv">                                
                               Please select a .csv or .xls file</div>
                                <input type="button" class="formbut" id="select_file_with_contacts" value="select file" />
                            </div>                            
                                                        
                        </div>
                        </div>
</div>
                    </td>
                </tr>
            </tbody></table>
        </td>
    </tr>
</table>
