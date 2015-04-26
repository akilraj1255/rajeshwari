


<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="247" valign="top">
    
    <?php $this->renderPartial('/default/left_side');?>
    
    </td>
    <td valign="top">
    <div class="cont_right formWrapper">
<?php 
/**
 * Ajax Crud Administration
 * FinanceFeeCategories * index.php view file
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
	 'Manage Finance Fee Categories'=>array('/fees'),
);
?>
<?php  
Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('finance-fee-categories-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>
<h1><?php echo Yii::t('fees','Fee Categories'); ?> </h1>

<?php

function getBatch($id)
{ 
$batch = Batches::model()->findByAttributes(array("id"=>$id));
if($batch!=NULL)
echo $batch->name;
}
?>

<div>
   <!-- <input id="add_finance-fee-categories" type="button" style="display:block; clear: both;"
           value="Create FinanceFeeCategories" class="client-val-form button">-->
           <br />

 <?php echo CHtml::link(Yii::t('fees','Create New Fee Category'), array('#'),array('id'=>'add_finance-fee-categories','class'=>'cbut')) ?>
 
  
</div>

<?php
//Strings for the delete confirmation dialog.
$del_con = Yii::t('admin_finance-fee-categories', 'Are you sure you want to delete this Fee category?');
$del_cont = Yii::t('admin_finance-fee-categories', 'Please note: All data (fee collection, fee particular and student details) associated with this fee category will be deleted.');
$del_title=Yii::t('admin_finance-fee-categories', 'Delete Confirmation');
 $del=Yii::t('admin_finance-fee-categories', 'Delete');
 $cancel=Yii::t('admin_finance-fee-categories', 'Cancel');
   ?>
<?php
    $this->widget('zii.widgets.grid.CGridView', array(
         'id' => 'finance-fee-categories-grid',
         'dataProvider' => $model->search(),
         /*'filter' => $model,*/
		  'pager'=>array('cssFile'=>Yii::app()->baseUrl.'/css/formstyle.css'),
 	     'cssFile' => Yii::app()->baseUrl . '/css/formstyle.css',
         'htmlOptions'=>array('class'=>'grid-view clear'),
          'columns' => array(
          		
		array('name'=>'name',
				'type'=>'raw',
				'value'=>'CHtml::link(CHtml::encode($data->name), Yii::app()->createUrl("fees/financeFeeParticulars/index",array("FinanceFeeParticulars[finance_fee_category_id]"=>$data->id)))'),
		'description',
		array('name'=>'batch_id',
				'type'=>'raw',
				'value'=>'getBatch($data->batch_id)'),
		/*'is_deleted',
		'is_master',*/
		/*
		'created_at',
		'updated_at',
		*/

    array(
                   'class' => 'CButtonColumn',
                    'buttons' => array(
                                                     'finance-fee-categories_delete' => array(
                                                     'label' => Yii::t('admin_finance-fee-categories', 'Delete'), // text label of the button
                                                      'url' => '$data->id', // a PHP expression for generating the URL of the button
                                                      'imageUrl' =>Yii::app()->request->baseUrl .'/js_plugins/ajaxform/images/icons/cross.png', // image URL of the button.   If not set or false, a text link is used
                                                      'options' => array("class" => "fan_del", 'title' => Yii::t('admin_finance-fee-categories', 'Delete')), // HTML options for the button   tag
                                                      ),
                                                     'finance-fee-categories_update' => array(
                                                     'label' => Yii::t('admin_finance-fee-categories', 'Update'), // text label of the button
                                                     'url' => '$data->id', // a PHP expression for generating the URL of the button
                                                     'imageUrl' =>Yii::app()->request->baseUrl .'/js_plugins/ajaxform/images/icons/pencil.png', // image URL of the button.   If not set or false, a text link is used
                                                     'options' => array("class" => "fan_update", 'title' => Yii::t('admin_finance-fee-categories', 'Update')), // HTML options for the    button tag
                                                        ),
                                                     'finance-fee-categories_view' => array(
                                                      'label' => Yii::t('admin_finance-fee-categories', 'View'), // text label of the button
                                                      'url' => '$data->id', // a PHP expression for generating the URL of the button
                                                      'imageUrl' =>Yii::app()->request->baseUrl .'/js_plugins/ajaxform/images/icons/properties.png', // image URL of the button.   If not set or false, a text link is used
                                                      'options' => array("class" => "fan_view", 'title' => Yii::t('admin_finance-fee-categories', 'View')), // HTML options for the    button tag
                                                        )
                                                    ),
                   'template' => '{finance-fee-categories_view}{finance-fee-categories_update}{finance-fee-categories_delete}',
            ),
			array(
                   'class' => 'CButtonColumn',
                    'buttons' => array(
                                                     
														'add' => array(
                                                        'label' => 'Add Particulars', // text label of the button
														
                                                        'url'=>'Yii::app()->createUrl("fees/financeFeeParticulars/index", array("FinanceFeeParticulars[finance_fee_category_id]"=>$data->id))', // a PHP expression for generating the URL of the button
                                                      
                                                        )
                                                    ),
                   'template' => '{add}',
				   'header'=>'Manage',
				   'htmlOptions'=>array('style'=>'width:17%'),
				   'headerHtmlOptions'=>array('style'=>'color:#FF6600')
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
                url: "<?php echo Yii::app()->request->baseUrl;?>/index.php?r=fees/financeFeeCategories/returnView",
                data:{"id":id,"YII_CSRF_TOKEN":"<?php echo Yii::app()->request->csrfToken;?>"},
                beforeSend : function() {
                    $("#finance-fee-categories-grid").addClass("ajax-sending");
                },
                complete : function() {
                    $("#finance-fee-categories-grid").removeClass("ajax-sending");
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
                url: "<?php echo Yii::app()->request->baseUrl;?>/index.php?r=fees/financeFeeCategories/returnForm",
                data:{"update_id":id,"YII_CSRF_TOKEN":"<?php echo Yii::app()->request->csrfToken;?>"},
                beforeSend : function() {
                    $("#finance-fee-categories-grid").addClass("ajax-sending");
                },
                complete : function() {
                    $("#finance-fee-categories-grid").removeClass("ajax-sending");
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
                                $.fn.yiiGridView.update('finance-fee-categories-grid', {url:'<?php echo Yii::app()->request->baseUrl;?>/index.php?r=fees/financeFeeCategories',data:{"FinanceFeeCategories_page":page}});
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
                url: "<?php echo Yii::app()->request->baseUrl;?>/index.php?r=fees/financeFeeCategories/ajax_delete",
                data:{"id":id,"YII_CSRF_TOKEN":"<?php echo Yii::app()->request->csrfToken;?>"},
                    beforeSend : function() {
                    $("#finance-fee-categories-grid").addClass("ajax-sending");
                },
                complete : function() {
                    $("#finance-fee-categories-grid").removeClass("ajax-sending");
                },
                success: function(data) {
                    var res = jQuery.parseJSON(data);
                     var page=$("li.selected  > a").text();
                    $.fn.yiiGridView.update('finance-fee-categories-grid', {url:'<?php echo Yii::app()->request->baseUrl;?>/index.php?r=fees/financeFeeCategories',data:{"FinanceFeeCategories_page":page}});
                }//success
            });//ajax
        };//end of deletes

        dialogs[id] =
                        $('<div style="text-align:center;"></div>')
                        .html('<?php echo  $del_con; ?><br><br><?php echo  $del_cont; ?><br>' + '<h2 style="color:#999999">ID: ' + id + '</h2>')
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

    $('#add_finance-fee-categories ').bind('click', function() {
        $.ajax({
            type: "POST",
            url: "<?php echo Yii::app()->request->baseUrl;?>/index.php?r=fees/financeFeeCategories/returnForm",
            data:{"YII_CSRF_TOKEN":"<?php echo Yii::app()->request->csrfToken;?>"},
                beforeSend : function() {
                    $("#finance-fee-categories-grid").addClass("ajax-sending");
                },
                complete : function() {
                    $("#finance-fee-categories-grid").removeClass("ajax-sending");
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
                                $.fn.yiiGridView.update('finance-fee-categories-grid', {url:'<?php echo Yii::app()->request->baseUrl;?>/index.php?r=fees/financeFeeCategories',data:{"FinanceFeeCategories_page":page}});
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
