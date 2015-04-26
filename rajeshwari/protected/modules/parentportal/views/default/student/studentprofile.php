<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,600,700,400italic' rel='stylesheet' type='text/css'>

<script>
	function getstudent() // Function to see student profile
	{
		var studentid = document.getElementById('studentid').value;
		if(studentid!='')
		{
			window.location= 'index.php?r=parentportal/default/studentprofile&id='+studentid;	
		}
		else
		{
			window.location= 'index.php?r=parentportal/default/studentprofile';
		}
	}
</script>

<div id="parent_Sect">
	<?php $this->renderPartial('leftside');?>
    <div id="parent_rightSect">
       <!-- <div class="parentright_innercon" style="background:#f2f2f2;">-->
        <div class="parentright_innercon">
        	<h1><?php echo Yii::t('parentportal','Student Profile');?></h1>
			<?php
            $guardian = Guardians::model()->findByAttributes(array('uid'=>Yii::app()->user->id));
            $students = Students::model()->findAllByAttributes(array('parent_id'=>$guardian->id,'is_active'=>'1','is_deleted'=>'0'));
            $student_list = CHtml::listData($students,'id','studentname');
           	$settings=UserSettings::model()->findByAttributes(array('user_id'=>1));
			if(count($students)==1 or (isset($_REQUEST['id']) and $_REQUEST['id']!=NULL)) // Single Student 
			{
				if(count($students)>1) // Show drop down only if more than 1 student present
				{
			?>
                    <div class="student_dropdown">
                        <?php
                        echo CHtml::dropDownList('sid','',$student_list,array('prompt'=>'Select Student','id'=>'studentid','style'=>'width:auto;','options'=>array($_REQUEST['id']=>array('selected'=>true)),'onchange'=>'getstudent();'));
                        ?>
                    </div> <!-- END div class="student_dropdown" -->
            <?php
				$student = Students::model()->findByAttributes(array('id'=>$_REQUEST['id'],'parent_id'=>$guardian->id,'is_active'=>'1','is_deleted'=>'0'));
				} // END Show drop down only if more than 1 student present
				else
				{
					$student = Students::model()->findByAttributes(array('parent_id'=>$guardian->id,'is_active'=>'1','is_deleted'=>'0'));	
				}
				 
			?>
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
                    <h2><?php echo ucfirst($student->first_name).' '.ucfirst($student->middle_name).' '.ucfirst($student->last_name);?></h2>
                    <ul>
                        <li class="rleft"><?php echo Yii::t('parentportal','Course :');?></li>
                        <li class="rright">
							<?php 
                            $batch = Batches::model()->findByPk($student->batch_id);
                            echo $batch->course123->course_name;
                            ?>
                        </li>
                        <li class="rleft"><?php echo Yii::t('parentportal','Batch :');?></li>
                        <li class="rright"><?php echo $batch->name;?></li>
                        <li class="rleft"><?php echo Yii::t('parentportal','Admission No :');?></li>
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
					<div class="flashMessage" style="color:#C00; padding-left:300px;">
						<?php echo Yii::app()->user->getFlash('successMessage'); ?>
					</div>
					<?php
					endif;
					
					if(Yii::app()->user->hasFlash('errorMessage')): 
					?>
					<div class="flashMessage" style="color:#C00; padding-left:300px;">
						<?php echo Yii::app()->user->getFlash('errorMessage'); ?>
					</div>
					<?php
					endif;
					?>
                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                        <tbody>
                            <tr>
                                <td ><strong><?php echo Yii::t('parentportal','Admission Date');?></strong></td>
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
                                <td><strong><?php echo Yii::t('parentportal','City');?></strong></td>
                                <td><?php echo $student->city; ?></td>
                            </tr>
                            
                            <tr>
                                <td ><strong><?php echo Yii::t('parentportal','Class Roll No');?></strong></td>
                                <td><?php echo $student->class_roll_no; ?></td>
                                <td><strong><?php echo Yii::t('parentportal','Date of Birth');?></strong></td>
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
                                <td> <strong><?php echo Yii::t('parentportal','Birth Place');?></strong></td>
                                <td><?php echo $student->birth_place; ?></td>
                                <td><strong><?php echo Yii::t('parentportal','Blood Group');?></strong></td>
                                <td><?php echo $student->blood_group; ?></td>
                            </tr>
                            
                            <tr>
                                <td><strong><?php echo Yii::t('parentportal','State');?></strong></td>
                                <td><?php echo $student->state; ?></td>
                                <td><strong><?php echo Yii::t('parentportal','Country');?></strong></td>
                                <td>
									<?php 
									$count = Countries::model()->findByAttributes(array('id'=>$student->country_id));
									if(count($count)!=0)
									echo $count->name;
									?>
                                </td>
                            </tr>
                            
                            <tr>
                            <td><strong><?php echo Yii::t('parentportal','Nationality');?></strong></td>
                            <td>
								<?php 
                                $natio_id=Countries::model()->findByAttributes(array('id'=>$student->nationality_id));
                                echo $natio_id->name; 
                                ?>
                            </td>
                            <td><strong><?php echo Yii::t('parentportal','Gender');?></strong></td>
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
                            <td><strong><?php echo Yii::t('parentportal','Pin Code');?>  </strong></td>
                            <td><?php echo $student->pin_code; ?></td>
                            <td colspan="2">&nbsp;</td>
                            </tr>
                            
                            <tr>
                            <td><strong><?php echo Yii::t('parentportal','Address Line1');?>  </strong></td>
                            <td><?php echo $student->address_line1; ?></td>
                            <td><strong><?php echo Yii::t('parentportal','Address Line 2');?></strong></td>
                            <td><?php echo $student->address_line2; ?></td>
                            </tr>
                            
                            <tr>
                            <td><strong><?php echo Yii::t('parentportal','Phone 1');?></strong></td>
                            <td><?php echo $student->phone1; ?></td>
                            <td><strong><?php echo Yii::t('parentportal','Phone 2');?></strong></td>
                            <td><?php echo $student->phone2; ?></td>
                            </tr>
                            
                            <tr>
                            <td><strong><?php echo Yii::t('parentportal','Language');?></strong></td>
                            <td><?php echo $student->language; ?></td>
                            <td><strong><?php echo Yii::t('parentportal','Email');?></strong></td>
                            <td><?php echo $student->email; ?></td>
                            </tr>
                            
                            <tr>
                                <td><strong><?php echo Yii::t('parentportal','Category');?></strong></td>
                                <td>
									<?php 
                                    $cat =StudentCategories::model()->findByAttributes(array('id'=>$student->student_category_id));
                                    if($cat!=NULL)
                                    echo $cat->name; 
                                    ?>
                                </td>
                                <td><strong><?php echo Yii::t('parentportal','Religion');?></strong></td>
                                <td><?php echo $student->religion; ?></td>
                            </tr>
                            
                            <tr>
                                <td><strong><?php echo Yii::t('parentportal','Emergeny Contact');?></strong></td>
                                <td>
                                    <?php 
                                    	echo ucfirst($guardian->first_name).' '.ucfirst($guardian->last_name);
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
                                        <?php /*?><td width="10%">
                                        <!--<a class="dcumnt_dnld" href="#"></a>-->
                                        <?php echo CHtml::link('dd', array('deletes','id'=>$document->id,'student_id'=>$document->student_id),array('class'=>'document_delet','style'=>'text-indent:-99999px;','confirm'=>'Are you sure you want to delete this?')); ?>
                                       
                                        </td>
                                        <td width="10%">
                                         <?php echo CHtml::link('d', array('download','id'=>$document->id,'student_id'=>$document->student_id),array('class'=>'dcumnt_dnld','style'=>'text-indent:-99999px;')); ?>
                                        </td><?php */?>
                                        
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
                Upload Documents
                <!-- Document form -->
                <div>
                    <?php
                    if($documents==NULL) 
                    {
                        $document = new studentDocument;
                    }
                      echo $this->renderPartial('student/documentform', array('model'=>$document,'sid'=>$student->id)); 
                    ?>
                </div>
                <!-- END Document form -->      
            </div><!-- END div class="document_box"-->     
            <!-- End Document Area -->
                
                
                
                
                
                
            <?php
			
			} // END Single Student
			elseif(count($students)>1 and !isset($_REQUEST['id'])) // More than one Student. Display List
			{
			?>
				<div id="profile_summary" style="position:relative; top:0px;">
				<?php
                foreach($students as $student)
                {
                ?>
                <div class="s_profile_listbx">
                    <div class="s_pimg">
                        <div class="s_pimgbx">
							<?php
                            if($student->photo_data!=NULL)
                            { 
                            echo '<img  src="'.$this->createUrl('/students/Students/DisplaySavedImage&id='.$student->primaryKey).'" alt="'.$student->photo_file_name.'" />';
                            }
                            elseif($student->gender=='M')
                            {
                                echo '<img  src="images/portal/s_profile_m_icon.png" alt='.$student->first_name.' />'; 
                            }
                            elseif($student->gender=='F')
                            {
                                echo '<img  src="images/portal/s_profile_fmicon.png" alt='.$student->first_name.' />';
                            }
                            ?>
                        </div> <!-- END div class="s_pimgbx" -->
                    </div> <!-- END div class="s_pimg" -->
                    <div class="s_profile_list_lft">
                        <?php echo CHtml::link(ucfirst($student->first_name).' '.ucfirst($student->middle_name).' '.ucfirst($student->last_name), array('/parentportal/default/studentprofile', 'id'=>$student->id));?>
                        <div class="s_profile_listinner">
                            <ul>
                                <li><?php echo Yii::t('parentportal','Course :');?>
                                    <span>
										<?php 
                                        $batch = Batches::model()->findByPk($student->batch_id);
                                        echo $batch->course123->course_name;
                                        ?>
                                    </span>
								</li>
                                <li><?php echo Yii::t('parentportal','Batch :');?><span><?php echo $batch->name;?></span></li>
                            </ul>
                        </div> <!-- END div class="s_profile_listinner" -->
                    </div> <!-- END div class="s_profile_list_lft" -->
                    <div class="s_profile_list_rht">
                    	<div class="s_profile_list_rht_txt"><?php echo Yii::t('parentportal','Admission No :');?><span><?php echo $student->admission_no; ?></span></div>
                    </div> <!-- END div class="s_profile_list_rht" -->
                    <div class="clear"></div>
                </div> <!-- END div class="s_profile_listbx" -->
                <?php
                } // END foreach($students as $student)
                ?>
                </div> <!-- END div id="profile_summary" -->
			<?php                
			} // END More than one student. End Display List
			elseif(count($students)<=0) // No Student
			{
			?>
            	<div class="yellow_bx" style="background-image:none;width:750px;padding-bottom:45px;">
                    <div class="y_bx_head">
                        No student details are available now!
                    </div>      
                </div>
            <?php
			} // END No Student
			?>
         
        </div> <!-- END div class="parentright_innercon" -->
    </div> <!-- END div id="parent_rightSect" -->
	<div class="clear"></div>
</div> <!-- div id="parent_Sect" -->