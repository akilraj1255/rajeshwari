<style type="text/css">

 .fancybox-wrap{ width:auto !important;}
 
 .notification{ width:88%;}
 
 .fancybox-inner{ width:auto !important;}
  
</style>

<?php
$this->breadcrumbs=array(
	Yii::t('examination','Exam Groups')=>array('/courses'),
	$model->name,
);

/**$this->menu=array(
	array('label'=>'List ', 'url'=>array('index')),
	array('label'=>'Create ', 'url'=>array('create')),
	array('label'=>'Update ', 'url'=>array('update', 'id'=>$model->)),
	array('label'=>'Delete ', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage ', 'url'=>array('admin')),
);*/
?>

<h1><?php echo Yii::t('examination','Exam Groups ');?><?php echo $model->name; ?></h1>

<?php /*?><?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'batch_id',
		'exam_type',
		'is_published',
		'result_published',
		'exam_date',
	),
)); ?><?php */?>
<div class="tableinnerlist">
<table width="100%" border="0" cellspacing="1" cellpadding="0">
  <tr>
    <td><?php echo Yii::t('examination','Exam Group Name');?></td>
    <td><?php echo $model->name; ?></td>
  </tr>
    <tr>
    <td><?php echo Yii::t('examination','Batch Name');?></td>
    <td><?php
    $posts=Batches::model()->findByAttributes(array('id'=>$model->batch_id));
	echo $posts->name;
	?></td>
  </tr>
    <tr>
    <td><?php echo Yii::t('examination','Exam Type');?></td>
    <td><?php echo $model->exam_type; ?></td>
  </tr>
</table>
</div>