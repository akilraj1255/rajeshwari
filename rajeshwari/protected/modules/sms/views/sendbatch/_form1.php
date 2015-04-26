<!--tags input-->
<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl;?>/css/tagsinput/jquery.tagsinput.css" />
<script src="<?php echo Yii::app()->request->baseUrl;?>/js/tagsinput/jquery.tagsinput.min.js"></script>
<style>


</style>
<div  class="cont_right formWrapper">
    <h1><?php echo Yii::t('os_sms_module','Send SMS to Batch');?></h1> 
    <div class="formCon">
    <div class="formConInner">
    <div class="form left" style=" padding-left:20px">
    
    <?php $form=$this->beginWidget('CActiveForm', array(
        'id'=>'sms-form',
        'enableAjaxValidation'=>false,
    )); 
	echo CHtml::hiddenField('sms', time());
	?>

	<?php $criteria  = new CDbCriteria;
		          $criteria ->compare('is_deleted',0); ?>

	<?php 
				if($batch_id!=NULL)
				{
					echo CHtml::dropDownList('batch','',CHtml::listData(Batches::model()->findAll($criteria),'id','coursename'),array('prompt'=>'Select',
					'ajax' => array(
					'type'=>'POST',
					'url'=>CController::createUrl('/sms/sendbatch/batch'),
					'update'=>'#recipients_num',
					'data'=>'js:$(this).serialize()',),'style'=>'width:270px;','options' => array($batch_id=>array('selected'=>true))));
				}
				else
				{
					echo CHtml::dropDownList('batch','',CHtml::listData(Batches::model()->findAll($criteria),'id','coursename'),array('prompt'=>'Select',
					'ajax' => array(
					'type'=>'POST',
					'url'=>CController::createUrl('/sms/sendbatch/batch'),
					'update'=>'#recipients_num',
					'data'=>'js:$(this).serialize()',),'style'=>'width:270px;'));
				}
				?>
			





    <table cellpadding="0">
    	<tr>
        	<td><h4><?php echo Yii::t('os_sms_module','Enter the phone number');?></h4>            
            	<textarea name="recipients_num" id="recipients_num" style="width:700px" > </textarea>
                <!-- <div class="sent_clear" id="clear_number_box"><a href="javascript:void(0);">Clear</a></div>
                <div class="sent_file_bg">
                
                <ul>
               		<li>
               		 <?php echo Yii::t('os_sms_module','Upload Contact');?>
               		     <span class="sub_text"><?php echo Yii::t('os_sms_module','.csv or .xls file');?></span>
           		     
               		</li>
                 	<li><a href="javascript:void(0);" id="browse_from_file"><span><?php echo Yii::t('os_sms_module','File');?></span></a></li>
                </ul>
                <div class="clear"></div>
                <div id="browse_resp" class="upload_con"></div>
                </div> -->
                
                
               
                
                
            </td>
        </tr>
        <tr>
        	<td>
            	
            	
            </td>
        </tr>
        <tr>
        	<td>
            	<span style="font-size:12px; font-weight:bold;">
            	Hi 
            </span></td>
        </tr>
        <tr>
        	<td>
            	<textarea placeholder="<?php echo Yii::t('os_sms_module','Message here...');?>" name="message" id="message" style="width:506px !important; height:120px;"></textarea>
                 <div class="sent_clear" id="clear_message_box"><a href="javascript:void(0);">Clear</a></div>
            </td>
        </tr>
        <tr>
        	<td>
            	<span class="msg" id="sms_msg"></span>                
            </td>
        </tr>
        <tr>
        	<td>
            	<input class="formbut" type="button" name="" id="sendsms" value="<?php echo Yii::t('os_sms_module','send sms');?>" />
            </td>
        </tr>
        
    </table>
        
    <?php $this->endWidget(); ?>
    
    
    	
    </div>
    </div>
    </div>
    
    <div class="clear"></div>
</div>
<script>
//tags input
// $('#recipients').tagsInput({
// 	defaultText:'Add numbers',
// });

$('#sendsms').click(function(e) {
	var numbers = $('#recipients_num').val(),
		message	= $('#message').val();
		
	if(numbers==""){
		set_sms_message('error', 'Enter numbers to send SMS');
		$('#recipients_tag').focus();
		return false;
	}
	else if(message==""){
		set_sms_message('error', 'Enter message to send SMS');
		$('#message').focus();
		return false;
	}
	
    $.ajax({
		url:'',
		type:'POST',
		dataType:"json",
		data:$('form#sms-form').serialize(),
		beforeSend: function(){
			set_sms_message('ok', 'Sending...', false);
		},
		success: function(response){
			if(response.status=="success"){
				set_sms_message('ok', response.message);				
				$('#recipients_tag, #recipients, #message').val('');
				$('#recipients_tagsinput span.tag').remove();
			}
			else{
				set_sms_message('error', response.message);
			}
		},
	});
});

var sms_message_timeout;
function set_sms_message(type, msg, hideafter){
	if(typeof hideafter=='undefined')	hideafter=true;
	
	if(type=="error")
		$('#sms_msg').removeClass('ok').addClass('error');
	else if(type=="ok")
		$('#sms_msg').removeClass('error').addClass('ok');
	
	$('#sms_msg').text(msg).css({opacity:1});
	
	if(hideafter){
		if(sms_message_timeout)
			window.clearTimeout(sms_message_timeout);
			
		sms_message_timeout	= window.setTimeout(function(){
			$('#sms_msg').animate({
				opacity:0,
			},
			1000,
			function(){
				$( this ).removeClass('ok').removeClass('error').text('');
			});
		}, 5000);
	}
}

$('#browse_from_contacts').click(function(e) {
	if($('#add_contacts').is(':visible')){
		$('#add_contacts').slideUp(function(){
			$(this).html('');
		});
	}
	else{
		$.ajax({
			url:'<?php echo Yii::app()->createUrl('/sms/contacts/search');?>',
			cache:false,
			beforeSend: function(){
				var img	= $('<img />');
				img.attr({
					src:'<?php echo Yii::app()->request->baseUrl;?>/images/loadinfo.gif',
				});
				$('#add_contacts').html(img);
			},
			success: function(response){
				$('#add_contacts').html( response ).slideDown();
			}
		});
	}
});

$('#browse_from_groups').click(function(e) {
	if($('#add_groups').is(':visible')){
		$('#add_groups').slideUp(function(){
			$(this).html('');
		});
	}
	else{
		$.ajax({
			url:'<?php echo Yii::app()->createUrl('/sms/contacts/groups');?>',
			cache:false,
			beforeSend: function(){
				var img	= $('<img />');
				img.attr({
					src:'<?php echo Yii::app()->request->baseUrl;?>/images/loadinfo.gif',
				});
				$('#add_groups').html(img);
			},
			success: function(response){
				$('#add_groups').html( response ).slideDown();
			}
		});
	}
});

$('#select_templates').click(function(e) {
	if($('#add_templates').is(':visible')){
		$('#add_templates').slideUp(function(){
			$(this).html('');
		});
	}
	else{
		$.ajax({
			url:'<?php echo Yii::app()->createUrl('/sms/templates/list');?>',
			cache:false,
			beforeSend: function(){
				var img	= $('<img />');
				img.attr({
					src:'<?php echo Yii::app()->request->baseUrl;?>/images/loadinfo.gif',
				});
				$('#add_templates').html(img);
			},
			success: function(response){
				$('#add_templates').html( response ).slideDown();
			}
		});
	}
});

$('.browse_assets').click(function(e) {	
	var targets	= ["#add_contacts", "#add_groups", "#add_templates"];
	if($(this).attr('data-target')){
		var target	= $(this).attr('data-target');
		var index = targets.indexOf(target);
		targets.splice(index, 1);
	}
	
	$.each(targets, function(index, element){
		$(element).slideUp();
	});
});

$('#clear_number_box').click(function(e) {
	$('#recipients_tag, #recipients').val('');
	$('#recipients_tagsinput span.tag').remove(); 
});

$('#clear_message_box').click(function(e) {
    $('#message').val('');
});
</script>
