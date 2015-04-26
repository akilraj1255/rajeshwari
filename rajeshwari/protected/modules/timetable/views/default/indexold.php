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
<div style="background:#fff; min-height:800px;">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
   
    <td valign="top">
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
      
        <td valign="top" width="75%">
        <div class="cont_right">
<h1>Timetable Management</h1>
	<div class="timetable_con">
    	<table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
          	 <th width="5%"></th>
            <th width="16%">Monday</th>
            <th width="16%">Tuesday</th>
            <th width="16%">Wednesday</th>
            <th width="16%">Thursday</th>
            <th width="16%">Friday</th>
            <th width="16%">Saturday</th>
          </tr>
          <tr>
          	<td width="5%" valign="top">
            	 <div class="innertable">
                 	<table width="100%" border="0" cellspacing="0" cellpadding="0">
                    	<tr>
                        	<th style="padding:11px 7px;"></th>
                         </tr>
                        <tr>
                        	<td style="padding:5px 7px; font-size:10px;"><strong> <?php echo CHtml::link(Yii::t('batch','1A'), array('#','id'=>1),array('id'=>'view_timetable'));?></strong></td>
                        </tr>
                         <tr>
                        	<td style="padding:3px 7px; font-size:10px;"><strong>2A</strong></td>
                        </tr>
                    </table>
                 </div>
            </td>
            <td width="16%" valign="top">
            <div class="innertable">
            	<table width="100%" border="0" cellspacing="0" cellpadding="0">
                	<tr>
                    <th>1</th>
                    <th>2</th>
                    <th>3</th>
                    <th>4</th>
                    <th>5</th>
                    <th>6</th>
                    <th>7</th>
                    <th>8</th>
                  </tr>
                  <tr>
                    <td class="green">MA</td>
                    <td class="red">SS</td>
                    <td class="blue">EN</td>
                    <td>SC</td>
                    <td>LAN</td>
                    <td>PT</td>
                    <td>SPL</td>
                    <td>CAT</td>
                  </tr>
                  <tr>
                    <td class="green">MA</td>
                    <td class="red">SS</td>
                    <td class="blue">EN</td>
                    <td>SC</td>
                    <td>LAN</td>
                    <td>PT</td>
                    <td>SPL</td>
                    <td>CAT</td>
                  </tr>
                </table>
			</div>
            </td>
            <td width="16%" valign="top">
            	<div class="innertable">
            	<table width="100%" border="0" cellspacing="0" cellpadding="0">
                	<tr>
                    <th>1</th>
                    <th>2</th>
                    <th>3</th>
                    <th>4</th>
                    <th>5</th>
                    <th>6</th>
                    <th>7</th>
                    <th>8</th>
                  </tr>
                  <tr>
                    <td class="green">MA</td>
                    <td class="red">SS</td>
                    <td class="blue">EN</td>
                    <td>SC</td>
                    <td>LAN</td>
                    <td>PT</td>
                    <td>SPL</td>
                    <td>CAT</td>
                  </tr>
                   <tr>
                    <td class="green">MA</td>
                    <td class="red">SS</td>
                    <td class="blue">EN</td>
                    <td>SC</td>
                    <td>LAN</td>
                    <td>PT</td>
                    <td>SPL</td>
                    <td>CAT</td>
                  </tr>
                </table>
			</div>
            </td>
            <td width="16%" valign="top">
            	<div class="innertable">
            	<table width="100%" border="0" cellspacing="0" cellpadding="0">
                	<tr>
                    <th>1</th>
                    <th>2</th>
                    <th>3</th>
                    <th>4</th>
                    <th>5</th>
                    <th>6</th>
                    <th>7</th>
                    <th>8</th>
                  </tr>
                  <tr>
                    <td class="green">MA</td>
                    <td class="red">SS</td>
                    <td class="blue">EN</td>
                    <td>SC</td>
                    <td>LAN</td>
                    <td>PT</td>
                    <td>SPL</td>
                    <td>CAT</td>
                  </tr>
                   <tr>
                    <td class="green">MA</td>
                    <td class="red">SS</td>
                    <td class="blue">EN</td>
                    <td>SC</td>
                    <td>LAN</td>
                    <td>PT</td>
                    <td>SPL</td>
                    <td>CAT</td>
                  </tr>
                </table>
			</div>
            </td>
            <td width="16%" valign="top">
            	<div class="innertable">
            	<table width="100%" border="0" cellspacing="0" cellpadding="0">
                	<tr>
                    <th>1</th>
                    <th>2</th>
                    <th>3</th>
                    <th>4</th>
                    <th>5</th>
                    <th>6</th>
                    <th>7</th>
                    <th>8</th>
                  </tr>
                  <tr>
                    <td class="green">MA</td>
                    <td class="red">SS</td>
                    <td class="blue">EN</td>
                    <td>SC</td>
                    <td>LAN</td>
                    <td>PT</td>
                    <td>SPL</td>
                    <td>CAT</td>
                  </tr>
                  <tr>
                    <td class="green">MA</td>
                    <td class="red">SS</td>
                    <td class="blue">EN</td>
                    <td>SC</td>
                    <td>LAN</td>
                    <td>PT</td>
                    <td>SPL</td>
                    <td>CAT</td>
                  </tr>
                </table>
			</div>
            </td>
            <td width="16%" valign="top">
            	<div class="innertable">
            	<table width="100%" border="0" cellspacing="0" cellpadding="0">
                	<tr>
                    <th>1</th>
                    <th>2</th>
                    <th>3</th>
                    <th>4</th>
                    <th>5</th>
                    <th>6</th>
                    <th>7</th>
                    <th>8</th>
                  </tr>
                  <tr>
                    <td class="green">MA</td>
                    <td class="red">SS</td>
                    <td class="blue">EN</td>
                    <td>SC</td>
                    <td>LAN</td>
                    <td>PT</td>
                    <td>SPL</td>
                    <td>CAT</td>
                  </tr>
                  <tr>
                    <td class="green">MA</td>
                    <td class="red">SS</td>
                    <td class="blue">EN</td>
                    <td>SC</td>
                    <td>LAN</td>
                    <td>PT</td>
                    <td>SPL</td>
                    <td>CAT</td>
                  </tr>
                </table>
			</div>
            </td>
            <td width="16%" valign="top">
            	<div class="innertable">
            	<table width="100%" border="0" cellspacing="0" cellpadding="0">
                	<tr>
                    <th>1</th>
                    <th>2</th>
                    <th>3</th>
                    <th>4</th>
                    <th>5</th>
                    <th>6</th>
                    <th>7</th>
                    <th>8</th>
                  </tr>
                  <tr>
                    <td class="green">MA</td>
                    <td class="red">SS</td>
                    <td class="blue">EN</td>
                    <td>SC</td>
                    <td>LAN</td>
                    <td>PT</td>
                    <td>SPL</td>
                    <td>CAT</td>
                  </tr>
                  <tr>
                    <td class="green">MA</td>
                    <td class="red">SS</td>
                    <td class="blue">EN</td>
                    <td>SC</td>
                    <td>LAN</td>
                    <td>PT</td>
                    <td>SPL</td>
                    <td>CAT</td>
                  </tr>
                </table>
			</div>
            </td>
          </tr>
        </table>

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