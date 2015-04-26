<?php Yii::app()->clientScript->registerCoreScript('jquery');

         //IMPORTANT about Fancybox.You can use the newest 2.0 version or the old one
        //If you use the new one,as below,you can use it for free only for your personal non-commercial site.For more info see
		//If you decide to switch back to fancybox 1 you must do a search and replace in index view file for "beforeClose" and replace with 
		//"onClosed"
        // http://fancyapps.com/fancybox/#license
          // FancyBox2
        Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/js_plugins/fancybox2/jquery.fancybox.js', CClientScript::POS_HEAD);
        Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl . '/js_plugins/fancybox2/jquery.fancybox.css', 'screen');
         // FancyBox
         //Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.'/js_plugins/fancybox/jquery.fancybox-1.3.4.js', CClientScript::POS_HEAD);
         // Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl.'/js_plugins/fancybox/jquery.fancybox-1.3.4.css','screen');
        //JQueryUI (for delete confirmation  dialog)
         Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.'/js_plugins/jqui1812/js/jquery-ui-1.8.12.custom.min.js', CClientScript::POS_HEAD);
         Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl.'/js_plugins/jqui1812/css/dark-hive/jquery-ui-1.8.12.custom.css','screen');
          ///JSON2JS
         Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.'/js_plugins/json2/json2.js');
       

           //jqueryform js
               Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.'/js_plugins/ajaxform/jquery.form.js', CClientScript::POS_HEAD);
              Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.'/js_plugins/ajaxform/form_ajax_binding.js', CClientScript::POS_HEAD);
              Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl.'/js_plugins/ajaxform/client_val_form.css','screen');  ?>
<?php
$this->breadcrumbs=array(
	$this->module->id,
);
?>
<div>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
   
    <td valign="top">
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
      <td width="247" valign="top">
    
   <?php $this->renderPartial('/default/left_side'); ?>
    
    </td>
        <td valign="top" width="75%">
        <div class="cont_right formWrapper">
			<h1>Timetable Management</h1>
            <div class="status_box">
           		 <div class="sb_icon"></div>
           		 No Course / Batch Selected.
                  <?php echo CHtml::ajaxLink('Select Batch',array('/site/explorer','widget'=>'2','rurl'=>'timetable/weekdays/timetable'),array('update'=>'#explorer_handler'),array('id'=>'explorer_change','class'=>'sb_but')); ?>
                 
            </div>
            <div class="edit_bttns" style="width:175px; top:15px;">
    			<ul>
    				<?php /*?><li><a class="addbttn" href="#"><span>View Master Timetable</span></a></li><?php */?>
    				
    			</ul>
    		<div class="clear"></div>
    		</div>
				<div class="yellow_bx yb_timetable">
                	<div class="y_bx_head">
                    	Before creating the time table make sure you follow the following instructions
                    </div>
                	<div class="y_bx_list timetable_list">
                    	<h1>Set Weekdays</h1>
                        <p>Set the weekdays, where the specific batch has classes, You can use the
school default or custom weekdays.</p>
                    </div>
                    <div class="y_bx_list timetable_list">
                    	<h1>Set Class Timings</h1>
                        <p>Create class timings for each batch,Enter each period 
start time and end time,Add break timings etc.</p>
                    </div>
                    <div class="y_bx_list timetable_list">
                    	<h1>Subjects & Subject Allocation</h1>
                        <p>Add existing subjects to the batch or create a new subject.
Associate each subject with the employee.</p>
                    </div>
                    <div class="y_bx_list timetable_list">
                    	<h1>Create Timetable</h1>
                        <p>Assigning each timing/period from the dropdown.</p>
                    </div>
    			</div>
		<div class="clear"></div>
		</div>
		</td>
       </tr>
     </table>
    </td>
   </tr>
</table></div>
<div id="view_timetable-grid"></div>
<script>
//VIEW

    $('#view_timetable').each(function(index) {
        var id = $(this).attr('href');
        $(this).bind('click', function() {
            $.ajax({
                type: "POST",
                url: "<?php echo Yii::app()->request->baseUrl;?>/index.php?r=timetable/view/returnView",
                data:{"id":id,"YII_CSRF_TOKEN":"<?php echo Yii::app()->request->csrfToken;?>"},
                beforeSend : function() {
                    $("#view_timetable-grid").addClass("ajax-sending");
                },
                complete : function() {
                    $("#view_timetable-grid").removeClass("ajax-sending");
                },
                success: function(data) {
                    $.fancybox(data,
                            {    "transitionIn" : "elastic",
                                "transitionOut" :"elastic",
                                "speedIn"              : 600,
                                "speedOut"         : 200,
                                "overlayShow"  : false,
                                "hideOnContentClick": false
                            });//fancybox
                    //  console.log(data);
                } //success
            });//ajax
            return false;
        });
    });

</script>