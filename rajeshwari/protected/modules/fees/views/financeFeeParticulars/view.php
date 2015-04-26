 <style type="text/css">
 .fancybox-wrap{ width: auto!important}
 
 .fancybox-inner{ width: auto!important}
 </style>

<?php
$this->breadcrumbs=array(
	'Finance Fee Particulars'=>array('/fees'),
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

<h1><?php echo Yii::t('fees','View Finance Fee Particulars');?></h1>
<div class="tableinnerlist">
<table width="100%" border="0" cellspacing="1" cellpadding="0">
  <tr>
    <td><?php echo Yii::t('fees','Name');?></td>
    <td><?php echo $model->name; ?></td>
  </tr>
  <tr>
    <td><?php echo Yii::t('fees','Description');?></td>
    <td><?php
	if($model->description)
	{
		echo $model->description;
	}
	else
	{
		echo '-';
	}
	?></td>
  </tr>
  <tr>
    <td><?php echo Yii::t('fees','Amount');?></td>
    <td><?php
	echo $model->amount;
	?></td>
  </tr>
  <tr>
    <td><?php echo Yii::t('fees','Finance Fee Category');?></td>
    <td>
	<?php
	$category = FinanceFeeCategories::model()->findByAttributes(array('id'=>$model->finance_fee_category_id));
	echo $category->name;
	?></td>
  </tr>
  <tr>
    <td><?php echo Yii::t('fees','Student Category');?></td>
    <td>
	<?php
	$student_category = StudentCategories::model()->findByAttributes(array('id'=>$model->student_category_id));
	if($student_category)
	{
		echo $student_category->name;
	}
	else
	{
		echo '-';
	}
	?></td>
  </tr>
  <tr>
    <td><?php echo Yii::t('fees','Admission No');?></td>
    <td><?php
	if($model->admission_no)
	{
		echo $model->admission_no;
	}
	else
	{
		echo '-';
	}
	?></td>
  </tr>
  
   
  
</table>
<?php /*?><?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'description',
		'amount',
		'finance_fee_category_id',
		'student_category_id',
		'admission_no',
		'student_id',
		'is_deleted',
		'created_at',
		'updated_at',
	),
)); ?>
<?php */?>
</div>
