
<style>
.mailbox-menu-newup{
	-moz-box-shadow:inset 0px 0px 0px 0px #ffffff !important;
	-webkit-box-shadow:inset 0px 0px 0px 0px #ffffff !important ;
	box-shadow:inset 0px 0px 0px 0px #ffffff !important;
	background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #1bb4fa), color-stop(1, #0994f0) ) !important;
	background:-moz-linear-gradient( center top, #1bb4fa 5%, #0994f0 100% ) !important;
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#1bb4fa', endColorstr='#0994f0') !important;
	background-color:#1bb4fa !important;
	-moz-border-radius:3px !important;
	-webkit-border-radius:3px !important;
	border-radius:3px !important;
	border:1px solid #0c93d1 !important;
	display:inline-block;
	color:#ffffff !important;
	font-family:arial;
	font-size:12px;
	font-weight:bold;
	padding:8px 14px !important;
	text-decoration:none;
	margin:0px 10px;
	
	/*text-shadow:1px 0px 0px #0664a3;*/
}
.mailbox-menu-newup a{color:#fff !important; text-decoration:none !important; display:block;}

.mailbox-message-subject{
	padding:10px;
}

.mailbox-menu-mangeup{
	-moz-box-shadow:inset 0px 0px 0px 0px #ffffff !important;
	-webkit-box-shadow:inset 0px 0px 0px 0px #ffffff !important ;
	box-shadow:inset 0px 0px 0px 0px #ffffff !important;
	background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #1bb4fa), color-stop(1, #0994f0) ) !important;
	background:-moz-linear-gradient( center top, #1bb4fa 5%, #0994f0 100% ) !important;
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#1bb4fa', endColorstr='#0994f0') !important;
	background-color:#1bb4fa !important;
	-moz-border-radius:3px !important;
	-webkit-border-radius:3px !important;
	border-radius:3px !important;
	border:1px solid #0c93d1 !important;
	display:inline-block;
	color:#ffffff !important;
	font-family:arial;
	font-size:12px;
	font-weight:bold;
	padding:8px 14px !important;
	text-decoration:none;

	/*text-shadow:1px 0px 0px #0664a3;*/
}
.mailbox-menu-mangeup a{color:#fff !important; text-decoration:none !important; display:block;}


</style>
<?php
$this->breadcrumbs=array(
	'File Uploads'=>array('index'),
	'Manage',
);
Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('file-uploads-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="80" valign="top" id="port-left">
     <?php $this->renderPartial('/default/left_side');?>
    
    </td>
    <td valign="top">
    
<div class="inner_new_head"><?php echo Yii::t('downloads','Manage File Uploads');?>
<div style="position:absolute; top:6px; right:10px;">
 <?php 
 echo CHtml::link(Yii::t('downloads','New Upload'),array('create'),array('class'=>'mailbox-menu-newup'));
 echo CHtml::link(Yii::t('downloads','All Uploads'),array('index'),array('class'=>'mailbox-menu-mangeup'));
 ?>
 </div>
</div>

 <div class="inner_new_table">
 
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'file-uploads-grid',
	'dataProvider'=>$model->search(),
	'pager'=>array('cssFile'=>Yii::app()->baseUrl.'/css/formstyle.css'),
    'cssFile' => Yii::app()->baseUrl . '/css/formstyle.css',
	'filter'=>$model,
	'columns'=>array(
		'title',		
		array('header'=>'Place Holder',
                    'value'=>array($model,'getplaceholder'),
                    'name'=> 'placeholder',
                ),
		array('header'=>'Course',
                    'value'=>array($model,'getcourse'),
                    'name'=> 'course',
					'filter' => false,
					'htmlOptions' => array('style'=>'width:300px;')
                ),
		array('header'=>'Batch',
                    'value'=>array($model,'getbatch'),
                    'name'=> 'batch',
					'filter' => false,
					'htmlOptions' => array('style'=>'width:300px;')
                ),
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>

</div>
</td>
</tr>
</table>