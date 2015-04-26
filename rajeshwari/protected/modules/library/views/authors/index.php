<?php 
/**
 * Ajax Crud Administration
 * Author * index.php view file
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
	 'Manage Authors'
);
?>
<?php  
Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('author-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="247" valign="top">

 <?php $this->renderPartial('/settings/library_left');?>
 </td>
    <td valign="top">
    <div class="cont_right formWrapper">
<h1>Authors </h1>

  

<div class="right">
<?php echo CHtml::link(Yii::t('library','Create Author'), array('#'),array('id'=>'add_author','class'=>'cbut')) ?>
    
</div>

<?php
//Strings for the delete confirmation dialog.
$del_con = Yii::t('admin_author', 'Are you sure you want to delete this author?');
$del_title=Yii::t('admin_author', 'Delete Confirmation');
 $del=Yii::t('admin_author', 'Delete');
 $cancel=Yii::t('admin_author', 'Cancel');
   ?>
<?php
    $this->widget('zii.widgets.grid.CGridView', array(
         'id' => 'author-grid',
         'dataProvider' => $model->search(),
         'filter' => $model,
		 'pager'=>array('cssFile'=>Yii::app()->baseUrl.'/css/formstyle.css'),
 	     'cssFile' => Yii::app()->baseUrl . '/css/formstyle.css',
         'htmlOptions'=>array('class'=>'grid-view clear'),
          'columns' => array(
          
		'author_name',
		
		array(
                   'class' => 'CButtonColumn',
                    'buttons' => array(
                                                     
														'add' => array(
                                                        'label' => 'View Books', // text label of the button
														'url' => '$data->auth_id',
                                                        'options' => array("class" => "fan_view", 'title' => Yii::t('admin_author', 'View')), 
                                                      
                                                        )
                                                    ),
                   'template' => '{add}',
				   'header'=>'Manage',
				   'htmlOptions'=>array('style'=>'width:17%'),
				   'headerHtmlOptions'=>array('style'=>'color:#FF6600')
            ),

    array(
                   'class' => 'CButtonColumn',
                    'buttons' => array(
                                                     'author_delete' => array(
                                                     'label' => Yii::t('admin_author', 'Delete'), // text label of the button
                                                      'url' => '$data->auth_id', // a PHP expression for generating the URL of the button
                                                      'imageUrl' =>Yii::app()->request->baseUrl .'/js_plugins/ajaxform/images/icons/cross.png', // image URL of the button.   If not set or false, a text link is used
                                                      'options' => array("class" => "fan_del", 'title' => Yii::t('admin_author', 'Delete')), // HTML options for the button   tag
                                                      ),
                                                     'author_update' => array(
                                                     'label' => Yii::t('admin_author', 'Update'), // text label of the button
                                                     'url' => '$data->auth_id', // a PHP expression for generating the URL of the button
                                                     'imageUrl' =>Yii::app()->request->baseUrl .'/js_plugins/ajaxform/images/icons/pencil.png', // image URL of the button.   If not set or false, a text link is used
                                                     'options' => array("class" => "fan_update", 'title' => Yii::t('admin_author', 'Update')), // HTML options for the    button tag
                                                        ),
                                                     'author_view' => array(
                                                      'label' => Yii::t('admin_author', 'View'), // text label of the button
                                                      'url' => '$data->auth_id', // a PHP expression for generating the URL of the button
                                                      'imageUrl' =>Yii::app()->request->baseUrl .'/js_plugins/ajaxform/images/icons/properties.png', // image URL of the button.   If not set or false, a text link is used
                                                      'options' => array("class" => "fan_view", 'title' => Yii::t('admin_author', 'View')), // HTML options for the    button tag
                                                        )
                                                    ),
                   'template' => '{author_update}{author_delete}',
            ),
			
    ),
           'afterAjaxUpdate'=>'js:function(auth_id,data){$.bind_crud()}'

                                            ));


   ?>
   </div>
   </td>
</tr>

</table>

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
                url: "<?php echo Yii::app()->request->baseUrl;?>/index.php?r=library/authors/returnView",
                data:{"id":id,"YII_CSRF_TOKEN":"<?php echo Yii::app()->request->csrfToken;?>"},
                beforeSend : function() {
                    $("#author-grid").addClass("ajax-sending");
                },
                complete : function() {
                    $("#author-grid").removeClass("ajax-sending");
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
                url: "<?php echo Yii::app()->request->baseUrl;?>/index.php?r=library/authors/returnForm",
                data:{"update_id":id,"YII_CSRF_TOKEN":"<?php echo Yii::app()->request->csrfToken;?>"},
                beforeSend : function() {
                    $("#author-grid").addClass("ajax-sending");
                },
                complete : function() {
                    $("#author-grid").removeClass("ajax-sending");
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
                                $.fn.yiiGridView.update('author-grid', {url:'<?php echo Yii::app()->request->baseUrl;?>/index.php?r=library/authors',data:{"Author_page":page}});
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
                url: "<?php echo Yii::app()->request->baseUrl;?>/index.php?r=library/authors/ajax_delete",
                data:{"id":id,"YII_CSRF_TOKEN":"<?php echo Yii::app()->request->csrfToken;?>"},
                    beforeSend : function() {
                    $("#author-grid").addClass("ajax-sending");
                },
                complete : function() {
                    $("#author-grid").removeClass("ajax-sending");
                },
                success: function(data) {
                    var res = jQuery.parseJSON(data);
                     var page=$("li.selected  > a").text();
                    $.fn.yiiGridView.update('author-grid', {url:'<?php echo Yii::app()->request->baseUrl;?>/index.php?r=library/authors',data:{"Author_page":page}});
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

    $('#add_author ').bind('click', function() {
        $.ajax({
            type: "POST",
            url: "<?php echo Yii::app()->request->baseUrl;?>/index.php?r=library/authors/returnForm",
            data:{"YII_CSRF_TOKEN":"<?php echo Yii::app()->request->csrfToken;?>"},
                beforeSend : function() {
                    $("#author-grid").addClass("ajax-sending");
                },
                complete : function() {
                    $("#author-grid").removeClass("ajax-sending");
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
                                $.fn.yiiGridView.update('author-grid', {url:'<?php echo Yii::app()->request->baseUrl;?>/index.php?r=library/authors',data:{"Author_page":page}});
                            } //onclosed function
                        });//fancybox
            } //success
        });//ajax
        return false;
    });//bind


})//document ready
    
</script>
