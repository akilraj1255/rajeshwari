<?php
$this->breadcrumbs=array(
	'File Categories'=>array('admin'),
	'Manage',
);



Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('file-category-grid', {
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
    
<div class="inner_new_head"><?php echo Yii::t('downloads','Manage File Category');?>

</div>

 <div class="inner_new_table">
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'file-category-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'pager'=>array('cssFile'=>Yii::app()->baseUrl.'/css/formstyle.css'),
    'cssFile' => Yii::app()->baseUrl . '/css/formstyle.css',
	'columns'=>array(
		'id',
		'category',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
</div>
</td>
</tr>
</table>