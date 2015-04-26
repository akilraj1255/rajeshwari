<script>

$('document').ready(function() {
$('#employee_head').click(function(){
$('#employee_body').toggle();
$('#student_body').hide();
$('#parent_body').hide();

});
$('#student_head').click(function(){
$('#student_body').toggle();
$('#employee_body').hide();
$('#parent_body').hide();

});
$('#parent_head').click(function(){
$('#parent_body').toggle();
$('#employee_body').hide();
$('#student_body').hide();
});

});


</script>
<?php
$this->breadcrumbs=array(
	Yii::t('os_sms_module','Sms'),	
	Yii::t('os_sms_module','System Generated Templates'),
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
                    <h1 style="margin-left:10px;"><?php echo Yii::t('os_sms_module','System Generated Templates');?></h1>
                    <div style="position:relative;">
                            <div class="contrht_bttns" style="right: 9px;">
								
                            </div>
                            <div class="clear"></div>
                            </div>
                            <div class="tempCon" style=" margin:10px; width:97%;" id="parent_head">
                            	<h4><strong>Parent</strong><span>SMS Templates to Parents</span></h4>
                            </div>
                           
                           
                    	<div style=" margin:10px;display:none; width:97%" class="sms-block formCon" id="parent_body">
    						
							<?php
                            foreach($templates as $template){
								
								if($template->user_type==1)
								{
									$this->renderPartial('_view', array('data'=>$template));	
								}						
							}
							
							if(count($templates)==0){
							?>
							<div style="padding-top:10px" class="notifications nt_red"><i><?php echo Yii::t('os_sms_module','No templates found');?></i></div>
							<?php
							}
							
							
							?>  
                           <div class="clear"></div>
                            
                            <div class="clear"></div>
                        </div> 
                            
                             <div class="tempCon" style=" margin:10px; width:97%; " id="student_head">
                            	<h4><strong>Student</strong><span>SMS Templates to Students</span></h4>
                            </div>
                            <div style=" margin:10px; width:97%;display:none;" class="sms-block formCon" id="student_body">
                            <?php
                            foreach($templates as $template){
								if($template->user_type==2)
								{
									$this->renderPartial('_view', array('data'=>$template));	
								}
							}
							
							if(count($templates)==0){
							?>
							<div style="padding-top:10px" class="notifications nt_red"><i><?php echo Yii::t('os_sms_module','No templates found');?></i></div>
							<?php
							}
							
							
							?>  
                             <div class="clear"></div>
                            
                            <div class="clear"></div>
                        </div> 
                             <div class="tempCon" style=" margin:10px; width:97%; " id="employee_head">
                            	<h4><strong>Employee</strong><span>SMS Templates to Employee</span></h4>
                            </div>
                            <div style=" margin:10px; width:97%;display:none" class="sms-block formCon" id="employee_body">
                            <?php
                            foreach($templates as $template){
								
								if($template->user_type==3)
								{
									$this->renderPartial('_view', array('data'=>$template));	
								}						
							}
							
							if(count($templates)==0){
							?>
							<div style="padding-top:10px" class="notifications nt_red"><i><?php echo Yii::t('os_sms_module','No templates found');?></i></div>
							<?php
							}
							
							
							?>  
                            <div class="clear"></div>
                            
                            <div class="clear"></div>
                        </div>  
                            
                    </td>
                </tr>
            </tbody></table>
        </td>
    </tr>
</table>


  <div class="clear"></div>