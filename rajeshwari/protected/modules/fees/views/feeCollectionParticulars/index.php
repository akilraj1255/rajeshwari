<?php 
/**
 * Ajax Crud Administration
 * FinanceFeeParticulars * index.php view file
 * InfoWebSphere {@link http://libkal.gr/infowebsphere}
 * @author  Spiros Kabasakalis <kabasakalis@gmail.com>
 * @link http://reverbnation.com/spiroskabasakalis/
 * @copyright Copyright &copy; 2011-2012 Spiros Kabasakalis
 * @since 1.0
 * @ver 1.3
 * @license The MIT License
 */
?><?php
 $this->breadcrumbs=array(
  'Finance Fee Particulars'=>array('/fees'),
);
?>
<?php  
Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
  $('.search-form').toggle();
  return false;
});
$('.search-form form').submit(function(){
  $.fn.yiiGridView.update('finance-fee-particulars-grid', {
    data: $(this).serialize()
  });
  return false;
});
");
?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="247" valign="top">
    
 <?php $this->renderPartial('/default/left_side');?>
    
    </td>
    <td valign="top">
    <div class="cont_right formWrapper">
<h1><?php echo Yii::t('fees','Finance Fee Particulars');?> </h1>

<br />

<div>
<!--    <input id="add_finance-fee-particulars" type="button" style="display:block; clear: both;"
           value="Create FinanceFeeParticulars" class="client-val-form button">-->
           <?php echo CHtml::link(Yii::t('fees','Create New Particulars'), array('#'),array('id'=>'add_finance-fee-particulars','class'=>'cbut')) ?>
</div>

<?php

//Strings for the delete confirmation dialog.
$del_con = Yii::t('admin_finance-fee-particulars', 'Are you sure you want to delete this finance-fee-particulars?');
$del_title=Yii::t('admin_finance-fee-particulars', 'Delete Confirmation');
 $del=Yii::t('admin_finance-fee-particulars', 'Delete');
 $cancel=Yii::t('admin_finance-fee-particulars', 'Cancel');
   ?>
<?php
    $this->widget('zii.widgets.grid.CGridView', array(
         'id' => 'finance-fee-particulars-grid',
         'dataProvider' => $model->search(),
         /*'filter' => $model,*/
      'pager'=>array('cssFile'=>Yii::app()->baseUrl.'/css/formstyle.css'),
       'cssFile' => Yii::app()->baseUrl . '/css/formstyle.css',
         'htmlOptions'=>array('class'=>'grid-view clear'),
          'columns' => array(
              'id',
    'name',
    /*'description',*/
    array(
      'name' => 'description',
      'type'=>'raw',
      'value' => '"$data->description" ? "$data->description" : "-"',
    ),
    /*'amount',*/
    array(
      'name' => 'amount',
      'type'=>'raw',
      'value' => array($model,'amount'),
    ),
    /*'finance_fee_category_id',*/
    /*'category',*/
    array(
      'name' => 'finance_fee_category_id',
      'type'=>'raw',
      'value' => array($model,'financecategory'),
    ),
    array(
      'name' => 'category',
      'type'=>'raw',
      'value' => array($model,'getcategory'),
    ),
    
    /*'student_id',
    'is_deleted',
    'created_at',
    'updated_at',
    */

    array(
                   'class' => 'CButtonColumn',
                    'buttons' => array(
                                                     'finance-fee-particulars_delete' => array(
                                                     'label' => Yii::t('admin_finance-fee-particulars', 'Delete'), // text label of the button
                                                      'url' => '$data->id', // a PHP expression for generating the URL of the button
                                                      'imageUrl' =>Yii::app()->request->baseUrl .'/js_plugins/ajaxform/images/icons/cross.png', // image URL of the button.   If not set or false, a text link is used
                                                      'options' => array("class" => "fan_del", 'title' => Yii::t('admin_finance-fee-particulars', 'Delete')), // HTML options for the button   tag
                                                      ),
                                                     'finance-fee-particulars_update' => array(
                                                     'label' => Yii::t('admin_finance-fee-particulars', 'Update'), // text label of the button
                                                     'url' => '$data->id', // a PHP expression for generating the URL of the button
                                                     'imageUrl' =>Yii::app()->request->baseUrl .'/js_plugins/ajaxform/images/icons/pencil.png', // image URL of the button.   If not set or false, a text link is used
                                                     'options' => array("class" => "fan_update", 'title' => Yii::t('admin_finance-fee-particulars', 'Update')), // HTML options for the    button tag
                                                        ),
                                                     'finance-fee-particulars_view' => array(
                                                      'label' => Yii::t('admin_finance-fee-particulars', 'View'), // text label of the button
                                                      'url' => '$data->id', // a PHP expression for generating the URL of the button
                                                      'imageUrl' =>Yii::app()->request->baseUrl .'/js_plugins/ajaxform/images/icons/properties.png', // image URL of the button.   If not set or false, a text link is used
                                                      'options' => array("class" => "fan_view", 'title' => Yii::t('admin_finance-fee-particulars', 'View')), // HTML options for the    button tag
                                                        )
                                                    ),
                   'template' => '{finance-fee-particulars_view}{finance-fee-particulars_update}{finance-fee-particulars_delete}',
            ),
    ),
           'afterAjaxUpdate'=>'js:function(id,data){$.bind_crud()}'

                                            ));


   ?>
<script type="text/javascript">
//document ready
$(function() {

    //declaring the function that will bind behaviors to the gridview buttons,
    //also applied after an ajax update of the gridview.(see 'afterAjaxUpdate' attribute of gridview).
        $. bind_crud= function(){
            
 //VIEW

    $('.fan_view').each(function(index) {
        var id = $(this).attr('href');
        $(this).bind('click', function() {
            $.ajax({
                type: "POST",
                url: "<?php echo Yii::app()->request->baseUrl;?>/index.php?r=fees/financeFeeParticulars/returnView",
                data:{"id":id,"YII_CSRF_TOKEN":"<?php echo Yii::app()->request->csrfToken;?>"},
                beforeSend : function() {
                    $("#finance-fee-particulars-grid").addClass("ajax-sending");
                },
                complete : function() {
                    $("#finance-fee-particulars-grid").removeClass("ajax-sending");
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

//UPDATE

    $('.fan_update').each(function(index) {
        var id = $(this).attr('href');
        $(this).bind('click', function() {
            $.ajax({
                type: "POST",
                url: "<?php echo Yii::app()->request->baseUrl;?>/index.php?r=fees/financeFeeParticulars/returnForm",
                data:{"update_id":id,"YII_CSRF_TOKEN":"<?php echo Yii::app()->request->csrfToken;?>","id":"<?php echo $_REQUEST['FinanceFeeParticulars']['finance_fee_category_id'] ?>"},
                beforeSend : function() {
                    $("#finance-fee-particulars-grid").addClass("ajax-sending");
                },
                complete : function() {
                    $("#finance-fee-particulars-grid").removeClass("ajax-sending");
                },
                success: function(data) {
                    $.fancybox(data,
                            {    "transitionIn"    :  "elastic",
                                 "transitionOut"  : "elastic",
                                 "speedIn"               : 600,
                                 "speedOut"           : 200,
                                 "overlayShow"    : false,
                                 "hideOnContentClick": false,
                                "afterClose":    function() {
                                   var page=$("li.selected  > a").text();
                                $.fn.yiiGridView.update('finance-fee-particulars-grid', {url:'<?php echo Yii::app()->request->baseUrl;?>/index.php?r=fees/financeFeeParticulars/index&FinanceFeeParticulars[finance_fee_category_id]=<?php echo $_REQUEST['FinanceFeeParticulars']['finance_fee_category_id'] ?>',data:{"FinanceFeeParticulars_page":page}});
                                }//onclosed
                            });//fancybox
                    //  console.log(data);
                } //success
            });//ajax
            return false;
        });
    });


// DELETE

    var deletes = new Array();
    var dialogs = new Array();
    $('.fan_del').each(function(index) {
        var id = $(this).attr('href');
        deletes[id] = function() {
            $.ajax({
                type: "POST",
                url: "<?php echo Yii::app()->request->baseUrl;?>/index.php?r=fees/financeFeeParticulars/ajax_delete",
                data:{"id":id,"YII_CSRF_TOKEN":"<?php echo Yii::app()->request->csrfToken;?>"},
                    beforeSend : function() {
                    $("#finance-fee-particulars-grid").addClass("ajax-sending");
                },
                complete : function() {
                    $("#finance-fee-particulars-grid").removeClass("ajax-sending");
                },
                success: function(data) {
                    var res = jQuery.parseJSON(data);
                    var page=$("li.selected  > a").text();
                    $.fn.yiiGridView.update('finance-fee-particulars-grid', {url:'<?php echo Yii::app()->request->baseUrl;?>/index.php?r=fees/financeFeeParticulars/index&FinanceFeeParticulars[finance_fee_category_id]=<?php echo $_REQUEST['FinanceFeeParticulars']['finance_fee_category_id'] ?>',data:{"FinanceFeeParticulars_page":page}});
           //$('#finance-fee-particulars-grid'+page).fadeOut("slow");
          
                }//success
            });//ajax
        };//end of deletes

        dialogs[id] =
                        $('<div style="text-align:center;"></div>')
                        .html('<?php echo  $del_con; ?><br><br>' + '<h2 style="color:#999999">ID: ' + id + '</h2>')
                       .dialog(
                        {
                            autoOpen: false,
                            title: '<?php echo  $del_title; ?>',
                            modal:true,
                            resizable:false,
                            buttons: [
                                {
                                    text: "<?php echo  $del; ?>",
                                    click: function() {
                                                                      deletes[id]();
                                                                      $(this).dialog("close");
                                                                      }
                                },
                                {
                                   text: "<?php echo $cancel; ?>",
                                   click: function() {
                                                                     $(this).dialog("close");
                                                                     }
                                }
                            ]
                        }
                );

        $(this).bind('click', function() {
                                                                      dialogs[id].dialog('open');
                                                                       // prevent the default action, e.g., following a link
                                                                      return false;
                                                                     });
    });//each end

        }//bind_crud end

   //apply   $. bind_crud();
  $. bind_crud();


//CREATE 

    $('#add_finance-fee-particulars ').bind('click', function() {
        $.ajax({
            type: "POST",
            url: "<?php echo Yii::app()->request->baseUrl;?>/index.php?r=fees/financeFeeParticulars/returnForm",
            data:{"YII_CSRF_TOKEN":"<?php echo Yii::app()->request->csrfToken;?>","id":"<?php echo $_REQUEST['FinanceFeeParticulars']['finance_fee_category_id'] ?>"},
                beforeSend : function() {
                    $("#finance-fee-particulars-grid").addClass("ajax-sending");
                },
                complete : function() {
                    $("#finance-fee-particulars-grid").removeClass("ajax-sending");
                },
            success: function(data) {
                $.fancybox(data,
                        {    "transitionIn"      : "elastic",
                            "transitionOut"   : "elastic",
                            "speedIn"                : 600,
                            "speedOut"            : 200,
                            "overlayShow"     : false,
                            "hideOnContentClick": false,
                            "afterClose":    function() {
                                   var page=$("li.selected  > a").text();
                                $.fn.yiiGridView.update('finance-fee-particulars-grid', {url:'<?php echo Yii::app()->request->baseUrl;?>/index.php?r=fees/financeFeeParticulars/index&FinanceFeeParticulars[finance_fee_category_id]=<?php echo $_REQUEST['FinanceFeeParticulars']['finance_fee_category_id'] ?>',data:{"FinanceFeeParticulars_page":page}});
                            } //onclosed function
                        });//fancybox
            } //success
        });//ajax
        return false;
    });//bind


})//document ready
    
</script>
</div>
    </td>
  </tr>
</table>

