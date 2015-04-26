
<script>
function new_1(id)
{
	var val = document.getElementById('max_mark').value;
	var i = 0;
	for(i=1;i<=id;i++)
	{
	    document.getElementById('max_mark_org'+i).value = val;
	}
}
function old_1(id)
{
	var val = document.getElementById('min_mark').value;
	var i = 0;
	for(i=1;i<=id;i++)
	{
	    document.getElementById('min_mark_org'+i).value = val;
	}
}
</script>
<div class="formCon">

<div class="formConInner">

<?php 
$check = ExamGroups::model()->findByAttributes(array('id'=>$_REQUEST['exam_group_id'],'batch_id'=>$_REQUEST['id']));
if($check!=NULL)
{ ?>
	<?php
if(isset($_REQUEST['id']))
{
	
  $posts=Subjects::model()->findAll("batch_id=:x AND no_exams=:y", array(':x'=>$_REQUEST['id'],':y'=>0))  ;
}

    ?>
    <?php if($posts!=NULL)
  { ?>
  <?php
$form=$this->beginWidget('CActiveForm', array(
	'id'=>'exams-form',
	'enableAjaxValidation'=>false,
)); ?>
<table width="80%" border="0" cellspacing="0" cellpadding="0">
<?php if(!isset($_REQUEST['exam_group_id']))
{?>
  <tr>
    <td><?php echo $form->labelEx($model_1,'name'); ?></td>
    <td><?php echo $form->textField($model_1,'name',array('value'=>$_SESSION['name'])); ?>
		<?php echo $form->error($model_1,'name'); ?></td>
    <td><?php echo $form->labelEx($model_1,'exam_type'); ?></td>
    <td><?php echo $form->textField($model_1,'exam_type',array('value'=>$_SESSION['type'])); ?>
		<?php echo $form->error($model_1,'exam_type'); ?></td>
  </tr>
  <?php }?>
  
    
    
		<?php echo $form->hiddenField($model,'exam_group_id'); ?>
		

 
</table>

    
    
   <h3><?php echo Yii::t('examination',' Enter exam related details here:');?></h3>
    
<div class="tableinnerlist">
<table width="95%" cellspacing="0" cellpadding="0">


<?php if(isset($_REQUEST['id']))
{
	
  $posts=Subjects::model()->findAll("batch_id=:x AND no_exams=:y", array(':x'=>$_REQUEST['id'],':y'=>0));
  if(count($posts)!=0)
  {
	  $c=count($posts);
	  $i=1;
	  $j=0;
	  foreach($posts as $posts_1)
	  {
		  $c--;
		   
		  $checksub = Exams::model()->findByAttributes(array('exam_group_id'=>$_REQUEST['exam_group_id'],'subject_id'=>$posts_1->id));
		  if($checksub==NULL)
		  {
			  if($j==0)
			  {?>
              <?php echo $form->labelEx($model,'max_mark'); ?>
                  <?php echo $form->textField($model,'max_mark',array('id'=>'max_mark')); ?>
		          <?php echo $form->error($model,'max_mark'); ?>
               <?php echo $form->labelEx($model,'min_mark'); ?>
               <?php echo $form->textField($model,'min_mark',array('id'=>'min_mark','onfocus'=>'new_1('.count($posts).');',
					'onmouseout'=>'old_1('.count($posts).');')); ?>
					<?php echo $form->error($model,'min_mark'); ?>
			 
              <br /><br />
              
              <tr>
              <th><?php echo Yii::t('examination','Subject name');?></th>
              <th><?php echo Yii::t('examination','Max Marks');?></th>
              <th><?php echo Yii::t('examination','Min Marks');?></th>
              <th><?php echo Yii::t('examination','Start Time');?></th>
              <th><?php echo Yii::t('examination','End Time');?></th>
              <?php /*?><th><?php echo Yii::t('examination','Do not create');?></th><?php */?>
              </tr>
              
              
              
              <?php $j++;}
			  
			  
		echo '<tr>';
		echo '<td>'.$posts_1->name.$form->hiddenField($model,'subject_id[]',array('value'=>$posts_1->id)).'</td>';
		echo '<td>'.$form->textField($model,'maximum_marks[]',array('size'=>3,'maxlength'=>3,'id'=>'max_mark_org'.$i)).'</td>';
		echo '<td>'.$form->textField($model,'minimum_marks[]',array('size'=>3,'maxlength'=>3,'id'=>'min_mark_org'.$i)).'</td>';
		echo '<td>';
		$this->widget('application.extensions.timepicker.timepicker', array(
		'model' => $model,

       'name'=>'start_time',
	   'tabularLevel' => "[]",

));
		echo '</td>';
		echo '<td>';
		$this->widget('application.extensions.timepicker.timepicker', array(
		'model' => $model,

       'name'=>'end_time',
	   'tabularLevel' => "[]",

));
		echo '</td>';
		
		/*echo '<td></td>';*/
		
		echo '</tr>';
		 $i++;


		 
		//echo $form->labelEx($model,'grading_level_id');
		echo $form->hiddenField($model,'grading_level_id');
	     echo $form->error($model,'grading_level_id'); 
	
		//echo $form->labelEx($model,'weightage');
		echo $form->hiddenField($model,'weightage');
		echo $form->error($model,'weightage');

		//echo $form->labelEx($model,'event_id');
		echo $form->hiddenField($model,'event_id'); 
		echo $form->error($model,'event_id');

		//echo $form->labelEx($model,'created_at');
		echo $form->hiddenField($model,'created_at',array('value'=>date('Y-m-d')));
		echo $form->error($model,'created_at');

		//echo $form->labelEx($model,'updated_at');
		echo $form->hiddenField($model,'updated_at',array('value'=>date('Y-m-d')));
		echo $form->error($model,'updated_at'); 
	  } 
	 
	  
  }
  
}}?>
	</table>

<br />

    <!--for eelctive subjects-->
    
    
<?php if($i==1)
	  {
		 
		 echo '<div class="notifications nt_green">'.Yii::t('examination','<i>Exams Created For All Subjects</i>').'</div>'; 
		
	  }
	  ?>
</div>

<br />



	<div align="center">
		<?php if($i!=1)echo CHtml::submitButton($model->isNewRecord ? Yii::t('examination','Create') : Yii::t('examination','Save'),array('class'=>'formbut')); ?>
	</div>
    
	

<?php $this->endWidget(); ?>
<?php }
	else{
		echo '<i>'.Yii::t('examination','No Subjects').'</i>';
		 } ?>
<?php }
else
{
	echo '<i>'.Yii::t('examination','No Such Exam Scheduled').'</i>';
	}?>
    </div>
    </div>
   
    
    <?php 
	$checkgroup = Exams::model()->findByAttributes(array('exam_group_id'=>$_REQUEST['exam_group_id']));
	if($checkgroup!=NULL)
	{?>
    <div >
    <div >
    <?php $model1=new Exams('search');
	      $model1->unsetAttributes();  // clear any default values
		  if(isset($_GET['exam_group_id']))
			$model1->exam_group_id=$_GET['exam_group_id'];
	     
		 
		  ?>
          <h3> Scheduled Subjects</h3>
          <?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'exams-grid',
	'dataProvider'=>$model1->search(),
	'pager'=>array('cssFile'=>Yii::app()->baseUrl.'/css/formstyle.css'),
 	'cssFile' => Yii::app()->baseUrl . '/css/formstyle.css',
	
	'columns'=>array(
		
		array(
		    'name'=>'subject_id',
			'value'=>array($model,'subjectname')
		
		),
		'start_time',
		'end_time',
		'maximum_marks',
		/*
		'minimum_marks',
		'grading_level_id',
		'weightage',
		'event_id',
		'created_at',
		'updated_at',
		*/
		array(
			'class'=>'CButtonColumn',
			'buttons' => array(
                                                     
														'update' => array(
                                                        'label' => 'update', // text label of the button
														
                                                        'url'=>'Yii::app()->createUrl("examination/exams/update", array("sid"=>$data->id,"exam_group_id"=>$data->exam_group_id,"id"=>$_REQUEST["id"]))', // a PHP expression for generating the URL of the button
                                                      
                                                        ),
														
                                                    ),
													'template'=>'{update} {delete}',
													'afterDelete'=>'function(){window.location.reload();}'
													
		),
		array(
                   'class' => 'CButtonColumn',
                    'buttons' => array(
                                                     
														'add' => array(
                                                        'label' => 'Exam Score', // text label of the button
														
                                                        'url'=>'Yii::app()->createUrl("examination/examScores/create", array("examid"=>$data->id,"id"=>$_REQUEST["id"]))', // a PHP expression for generating the URL of the button
                                                      
                                                        )
                                                    ),
                   'template' => '{add}',
				   'header'=>'Manage',
				   'htmlOptions'=>array('style'=>'width:17%'),
				   'headerHtmlOptions'=>array('style'=>'color:#FF6600')
            ),
	),
)); echo '</div></div>';}
else
{
	echo '<div class="notifications nt_red"><i>'.Yii::t('examination','Nothing Scheduled').'</i></div>'; 
	}?>

<br />
  