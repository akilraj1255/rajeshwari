<div id="parent_Sect">
	<?php $this->renderPartial('leftside');?> 
    <?php    
	$student=Students::model()->findByAttributes(array('uid'=>Yii::app()->user->id));
    $guard = Guardians::model()->findByAttributes(array('id'=>$student->parent_id));
    $settings=UserSettings::model()->findByAttributes(array('user_id'=>1));
    ?>
    
    
    <div id="parent_rightSect">
        <div class="parentright_innercon">
            <h1><?php echo Yii::t('studentportal','Profile');?></h1>            
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
            <div class="profile_details">
            	<?php
				Yii::app()->clientScript->registerScript(
				   'myHideEffect',
				   '$(".flashMessage").animate({opacity: 1.0}, 3000).fadeOut("slow");',
				   CClientScript::POS_READY
				);
				
				if(Yii::app()->user->hasFlash('successMessage')): 
				?>
				<div class="flashMessage" style="background:#FFF; color:#C00; padding-left:300px;">
					<?php echo Yii::app()->user->getFlash('successMessage'); ?>
				</div>
				<?php
				endif;
				
				if(Yii::app()->user->hasFlash('errorMessage')): 
				?>
				<div class="flashMessage" style="background:#FFF; color:#C00; padding-left:300px;">
					<?php echo Yii::app()->user->getFlash('errorMessage'); ?>
				</div>
				<?php
				endif;
				?>
                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tbody>
                        <tr>
                            <td ><strong><?php echo Yii::t('studentportal','Admission Date');?></strong></td>
                            <td>
                                <?php 
                                if($settings!=NULL)
                                {	
                                    $date1=date($settings->displaydate,strtotime($student->admission_date));
                                    echo $date1;
                                }
                                else
                                {
                                    echo $student->admission_date;
                                }
                                ?>
                            </td>
                            <td><strong><?php echo Yii::t('studentportal','City');?></strong></td>
                            <td><?php echo $student->city; ?></td>
                        </tr>
                        
                        <tr>
                            <td ><strong><?php echo Yii::t('studentportal','Class Roll No');?></strong></td>
                            <td><?php echo $student->class_roll_no; ?></td>
                            <td><strong><?php echo Yii::t('studentportal','Date of Birth');?></strong></td>
                            <td>
                                <?php 
                                if($settings!=NULL)
                                {
                                $date1=date($settings->displaydate,strtotime($student->date_of_birth));
                                echo $date1;
                                }
                                else
                                {
                                    echo $student->date_of_birth;
                                }
                                ?>
                            </td>
                        </tr>
                        
                        <tr>
                            <td> <strong><?php echo Yii::t('studentportal','Birth Place');?></strong></td>
                            <td><?php echo $student->birth_place; ?></td>
                            <td><strong><?php echo Yii::t('studentportal','Blood Group');?></strong></td>
                            <td><?php echo $student->blood_group; ?></td>
                        </tr>
                        
                        <tr>
                            <td><strong><?php echo Yii::t('studentportal','State');?></strong></td>
                            <td><?php echo $student->state; ?></td>
                            <td><strong><?php echo Yii::t('studentportal','Country');?></strong></td>
                            <td>
                                <?php 
                                $count = Countries::model()->findByAttributes(array('id'=>$student->country_id));
                                if(count($count)!=0)
                                echo $count->name;
                                ?>
                            </td>
                        </tr>
                        
                        <tr>
                        <td><strong><?php echo Yii::t('studentportal','Nationality');?></strong></td>
                        <td>
                            <?php 
                            $natio_id=Countries::model()->findByAttributes(array('id'=>$student->nationality_id));
                            echo $natio_id->name; 
                            ?>
                        </td>
                        <td><strong><?php echo Yii::t('studentportal','Gender');?></strong></td>
                        <td>
                            <?php 
                            if($student->gender=='M')
                            echo 'Male';
                            else 
                            echo 'Female'; 
                            ?>
                        </td>
                        </tr>
                        
                        <tr>
                        <td><strong><?php echo Yii::t('studentportal','Pin Code');?>  </strong></td>
                        <td><?php echo $student->pin_code; ?></td>
                        <td colspan="2">&nbsp;</td>
                        </tr>
                        
                        <tr>
                        <td><strong><?php echo Yii::t('studentportal','Address Line1');?>  </strong></td>
                        <td><?php echo $student->address_line1; ?></td>
                        <td><strong><?php echo Yii::t('studentportal','Address Line 2');?></strong></td>
                        <td><?php echo $student->address_line2; ?></td>
                        </tr>
                        
                        <tr>
                        <td><strong><?php echo Yii::t('studentportal','Phone 1');?></strong></td>
                        <td><?php echo $student->phone1; ?></td>
                        <td><strong><?php echo Yii::t('studentportal','Phone 2');?></strong></td>
                        <td><?php echo $student->phone2; ?></td>
                        </tr>
                        
                        <tr>
                        <td><strong><?php echo Yii::t('studentportal','Language');?></strong></td>
                        <td><?php echo $student->language; ?></td>
                        <td><strong><?php echo Yii::t('studentportal','Email');?></strong></td>
                        <td><?php echo $student->email; ?></td>
                        </tr>
                        
                        <tr>
                            <td><strong><?php echo Yii::t('studentportal','Category');?></strong></td>
                            <td>
                                <?php 
                                $cat =StudentCategories::model()->findByAttributes(array('id'=>$student->student_category_id));
                                if($cat!=NULL)
                                echo $cat->name; 
                                ?>
                            </td>
                            <td><strong><?php echo Yii::t('studentportal','Religion');?></strong></td>
                            <td><?php echo $student->religion; ?></td>
                        </tr>
                        
                        <tr>
                            <td><strong><?php echo Yii::t('studentportal','Emergeny Contact');?></strong></td>
                            <td>
                                <?php 
                                    echo ucfirst($guard->first_name).' '.ucfirst($guard->last_name);
                                ?>
                            </td>
                            <td colspan="2">&nbsp;</td>
                        </tr>
                    </tbody>
                </table>
            </div> <!-- END div class="profile_details"-->
            
            
            <!-- Document Area -->
            <div class="document_box">
                <div class="document_table">
                    <?php
                    $documents = StudentDocument::model()->findAllByAttributes(array('student_id'=>$student->id)); // Retrieving documents of student with id $_REQUEST['id'];
                    ?>   
                    <table width="100%" cellspacing="0" cellpadding="0">
                    <tbody>
                        <tr>
                           <th><?php echo Yii::t('students','Document Name'); ?></th>
                        </tr>
                    </tbody>
                    </table>
                        <table width="100%" border="0" cellspacing="0" cellpadding="0" style="border-top:none;">
                            <?php
                            if($documents) // If documents present
                            {
                                foreach($documents as $document) // Iterating the documents
                                {
                            ?>
                                    <tr>
                                        <td width="90%"><?php echo ucfirst($document->title);?></td>
                                        <td width="10%">
                                        	<?php
											// Setting class for status label
											if($document->is_approved == -1)
											{
												$class = 'tag_disapproved';
											}
											elseif($document->is_approved == 0)
											{
												$class = 'tag_pending';
											}
											elseif($document->is_approved == 1)
											{
												$class = 'tag_approved';
											}
											echo '<div style="width:127px">';
											echo '<div class="'.$class.'"></div>';
											echo '</div>';
											?>
                                        </td>
                                        <td width="10%">
                                        	<ul class="tt-wrapper">
                                            	 <li>
													<?php 
                                                    if($document->is_approved == 1)
                                                    {
                                                    echo CHtml::link('<span>You cannot edit an approved document.</span>', array('documentupdate','id'=>$document->student_id,'document_id'=>$document->id),array('class'=>'tt-edit-disabled','onclick'=>'return false;')); 
                                                    }
                                                    else
                                                    {
                                                        echo CHtml::link('<span>Edit</span>', array('documentupdate','id'=>$document->student_id,'document_id'=>$document->id),array('class'=>'tt-edit')); 
                                                    }
                                                    ?>
                                                </li>
												<li>
												 <?php 
                                                 echo CHtml::link('<span>Download</span>', array('download','id'=>$document->id,'student_id'=>$document->student_id),array('class'=>'tt-download')); 
                                                 ?>
                                         		</li>
                                                <li>
													<?php 
													if($document->is_approved == 1)
													{
														echo CHtml::link('<span>You cannot delete an approved document.</span>', array('deletes','id'=>$document->id,'student_id'=>$document->student_id),array('class'=>'tt-delete-disabled','onclick'=>'return false;')); 
													}
													else
													{
														echo CHtml::link('<span>Delete</span>', array('deletes','id'=>$document->id,'student_id'=>$document->student_id),array('class'=>'tt-delete','confirm'=>'Are you sure you want to delete this?')); 
													}
													?>
                                                </li>
											</ul>                                                
                                        </td>
                                        
                          </tr>
                            <?php	
                                }
                                
                            }
                            else // If no documents present
                            {
                            ?>
                                <tr>
                                    <td colspan="2" style="text-align:center;"><?php echo Yii::t('students','No document(s) uploaded'); ?></td>
                                </tr>
                            <?php
                            }
                            ?>
                        </table>
                  
                </div><!-- END div class="document_table" -->
				<br/>
                <?php echo Yii::t('studentportal','Upload Documents'); ?>
                <!-- Document form -->
                <div>
                    <?php
                    if($documents==NULL) 
                    {
                        $document = new studentDocument;
                    }
                      echo $this->renderPartial('documentform', array('model'=>$document,'sid'=>$student->id)); 
                    ?>
                </div>
                <!-- END Document form -->      
            </div><!-- END div class="document_box"-->     
            <!-- End Document Area -->
            
            
            
        </div> <!-- END div class="parentright_innercon" -->
    </div> <!-- END div id="parent_rightSect" -->
    <div class="clear"></div>
</div> <!-- END div id="parent_Sect" -->
<div class="clear"></div>

