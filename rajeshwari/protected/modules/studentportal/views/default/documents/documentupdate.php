<script>
	function removeFile() 
	{	
		if(document.getElementById("new_file").style.display == "none")
		{
			document.getElementById("existing_file").style.display = "none";
			document.getElementById("new_file").style.display = "block";
			document.getElementById("new_file_field").value = "1";
		}
		
		return false;
	}
</script>

<div id="parent_Sect">
	<?php 
	$this->renderPartial('leftside');
    $student=Students::model()->findByAttributes(array('uid'=>Yii::app()->user->id));
    $guard = Guardians::model()->findByAttributes(array('id'=>$student->parent_id));
    $settings=UserSettings::model()->findByAttributes(array('user_id'=>1));
	?>
    <div id="parent_rightSect">
        <div class="parentright_innercon">
        	<div class="profile_top">
                <div class="prof_img">
                	<?php
                     if($student->photo_data!=NULL)
                     { 
                        echo '<img  src="'.$this->createUrl('/students/Students/DisplaySavedImage&id='.$student->primaryKey).'" alt="'.$student->photo_file_name.'" width="100" height="103" />';
                    }
                    elseif($student->gender=='M')
                    {
                        echo '<img  src="images/portal/prof-img_male.png" alt='.$student->first_name.' width="100" height="103" />'; 
                    }
                    elseif($student->gender=='F')
                    {
                        echo '<img  src="images/portal/prof-img_female.png" alt='.$student->first_name.' width="100" height="103" />';
                    }
                    ?>
                </div> <!-- END div class="prof_img" -->
                <h2><?php echo ucfirst($student->last_name).' '.ucfirst($student->first_name);?></h2>
                <ul>
                    <li class="rleft"><?php echo Yii::t('studentportal','Course :');?></li>
                    <li class="rright">
                        <?php 
                        $batch = Batches::model()->findByPk($student->batch_id);
                        echo $batch->course123->course_name;
                        ?>
                    </li>
                    <li class="rleft"><?php echo Yii::t('studentportal','Batch :');?></li>
                    <li class="rright"><?php echo $batch->name;?></li>
                    <li class="rleft"><?php echo Yii::t('studentportal','Admission No :');?></li>
                    <li class="rright"><?php echo $student->admission_no; ?></li>
                </ul>
            </div> <!-- END div class="profile_top" -->
            	
            <!-- Document Area -->
            <div class="document_box">
            	<br />
            	
            	<div class="form">
                	<div class="edit_bttns" style="top:175px; right:15px;">
                        <ul>
                            <li><span>
                                <?php echo CHtml::link(Yii::t('students','Student Profile'), array('profile'),array('class'=>' edit ')); ?>
                           </span> </li>
                        </ul>
                	</div> <!-- END div class="edit_bttns last" -->

					<?php $form=$this->beginWidget('CActiveForm', array(
                        'id'=>'student-document-form',
                        'enableAjaxValidation'=>false,
                        'htmlOptions'=>array('enctype'=>'multipart/form-data'),
                        //'action'=>CController::createUrl('documentupdate',array('document_id'=>$model->id))
                    )); ?>
                    
                        <?php 
                            if($form->errorSummary($model)){
                        ?>
                            <div class="errorSummary"><?php echo Yii::t('studentportal','Input Error'); ?><br />
                                <span><?php echo Yii::t('studentportal','Please fix the following error(s).'); ?></span>
                            </div>
                        <?php 
                            }
                            //var_dump($model->attributes);exit;
                        ?>
                        
                        <p class="note" style="float:left"><?php echo Yii::t('studentportal','Fields with'); ?> <span class="required">*</span> <?php echo Yii::t('studentportal','are required. Upload a file if it is removed.'); ?></p>
                        <?php /*?><p class="note" style="float:left">Fields with <span class="required">*</span> are required.</p><?php */?>
                        
                        
                        <?php
                        Yii::app()->clientScript->registerScript(
                           'myHideEffect',
                           '$(".error").animate({opacity: 1.0}, 3000).fadeOut("slow");',
                           CClientScript::POS_READY
                        );
                        if(Yii::app()->user->hasFlash('errorMessage')): 
                        ?>
                            <div class="error" style="background:#FFF; color:#C00; margin-left:340px; top:150px; width:300px;">
                                <?php echo Yii::app()->user->getFlash('errorMessage'); ?>
                            </div>
                        <?php
                        endif;
                        ?>
                    
                        <div class="formCon" style="clear:left;">
                            <div class="formConInner" id="innerDiv">
                                <table width="80%" border="0" cellspacing="0" cellpadding="0" id="documentTable">
                                    <tr>
                                        <td width="10%"><?php echo $form->labelEx($model,'Document Name',array('style'=>'float:left;')); ?><span class="required">&nbsp;*</span></td>
                                        <td>&nbsp;</td>
                                        <td>&nbsp;<?php //echo $form->labelEx($model,Yii::t('students','file')); ?></td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <?php echo $form->textField($model,'title',array('size'=>25,'maxlength'=>225)); ?>
                                             <?php echo $form->error($model,'title'); ?>
                                        </td>
                                        <td id="existing_file">
                                            <?php 
                                            if($model->file!=NULL and $model->file_type!=NULL)
                                            {
                                            ?>
                                            <ul class="tt-wrapper">
                                                <li><span>
                                                    <?php echo CHtml::link('View', array('download','id'=>$model->id,'student_id'=>$model->student_id),array('class'=>'tt-download')); ?>
                                               </span> </li>
                                                <li><span>
                                                    <?php echo CHtml::link('Remove', array('#'),array('class'=>'tt-delete','onclick'=>'return removeFile();')); ?>
                                               </span> </li>
                                            </ul>
                                            <?php
                                            }
                                            ?>
                                        </td>
                                        <td id="new_file" style="display:none; padding-left:20px;">
                                            <?php echo $form->fileField($model,'file'); ?>
                                            <?php echo $form->error($model,'file'); ?>
                                            <?php echo $form->hiddenField($model,'new_file_field',array('value'=>0,'id'=>'new_file_field')); ?>
                                        </td>
                                    </tr>
                                </table>
                                
                                <div class="row" id="student_id">
                                    <?php echo $form->hiddenField($model,'student_id',array('value'=>$model->student_id)); ?>
                                    <?php echo $form->error($model,'student_id'); ?>
                                </div>
                            
                                <div class="row" id="file_type">
                                    <?php //echo $form->labelEx($model,'file_type'); ?>
                                    <?php echo $form->hiddenField($model,'file_type'); ?>
                                    <?php echo $form->error($model,'file_type'); ?>
                                </div>
                            
                                <div class="row" id="created_at">
                                    <?php //echo $form->labelEx($model,'created_at'); ?>
                                    <?php echo $form->hiddenField($model,'created_at'); ?>
                                    <?php echo $form->error($model,'created_at'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="row buttons">
                            <?php //echo CHtml::button('Add Another', array('class'=>'formbut','id'=>'addAnother','onclick'=>'addRow("documentTable");')); ?>
                            <?php echo CHtml::submitButton(Yii::t('studentportal','Update'),array('class'=>'formbut','submit'=>'documentupdate')); ?>
                        </div>
                            
                    
                    <?php $this->endWidget(); ?>
                   
                    </div> 
                    <!-- form -->
            </div> <!-- END div class="document_box" -->
        </div> <!-- END div class="parentright_innercon" -->
	</div> <!-- END div id="parent_rightSect" -->
    <div class="clear"></div>
</div> <!-- END div id="parent_Sect" -->
<div class="clear"></div>


