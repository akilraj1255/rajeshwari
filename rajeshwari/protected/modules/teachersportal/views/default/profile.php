
	 <!--navigation ends here-->
     <!--banner starts here-->
     <!--<section id="innerbanner"><img src="images/innerbanner.png" width="1000" height="168"></section>-->
      <!--banner ends here-->
      <!--midsection starts here-->
      
      <!--midsection ends here-->
      <!--innersection starts here-->
      <div id="parent_Sect">
        <?php $this->renderPartial('leftside');?> 
        <?php
		$employee=Employees::model()->findByAttributes(array('uid'=>Yii::app()->user->id));
		
		/*$student=Students::model()->findByAttributes(array('id'=>$guard->ward_id));*/
		
		$settings=UserSettings::model()->findByAttributes(array('user_id'=>1));
		?>
        <div id="parent_rightSect">
        	<div class="parentright_innercon">
            	<h1><?php echo Yii::t('teachersportal','Profile');?></h1>
       		  <div class="profile_top">
               	<div class="prof_img">
                <?php
                     if($employee->photo_data!=NULL)
                     { 
                        echo '<img  src="'.$this->createUrl('/students/Students/DisplaySavedImage&id='.$employee->primaryKey).'" alt="'.$employee->photo_file_name.'" width="100" height="103" />';
                    }
                    elseif($employee->gender=='M')
                    {
                        echo '<img  src="images/portal/prof-img_male.png" alt='.$employee->first_name.' width="100" height="103" />'; 
                    }
                    elseif($employee->gender=='F')
                    {
                        echo '<img  src="images/portal/prof-img_female.png" alt='.$employee->first_name.' width="100" height="103" />';
                    }
                    ?>
                </div>
                <h2><?php echo ucfirst($employee->last_name.' '.$employee->first_name);?></h2>
                <ul>
                	<li class="rleft"><?php echo Yii::t('teachersportal','Job Title :');?></li>
                    <li class="rright">
                    <?php 
					//$posts=Batches::model()->findByPk($employee->job_title);
					echo $employee->job_title;
					?>
                  	</li>
                    <li class="rleft"><?php echo Yii::t('teachersportal','Department :');?></li>
                    <li class="rright"><?php $department = EmployeeDepartments::model()->findByAttributes(array('id'=>$employee->employee_department_id));
		 				echo $department->name;?></li>
                    <li class="rleft"><?php echo Yii::t('teachersportal','Employee No :');?></li>
                    <li class="rright"><?php echo $employee->employee_number; ?></li>
                </ul>
               	</div>
                <div class="profile_details">
                	<table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tbody>
                      <tr>
                        <td ><strong><?php echo Yii::t('teachersportal','Joining Date');?></strong></td>
                         <td>
							<?php 
							if($employee->joining_date)
							{
								if($settings!=NULL)
								{	
									$employee->joining_date=date($settings->displaydate,strtotime($employee->joining_date));
									
								}
								
								echo $employee->joining_date;
							}?>
                        </td>
                        <td><strong><?php echo Yii::t('teachersportal','Category');?></strong></td>
                        <td><?php $cat=EmployeeCategories::model()->findByAttributes(array('id'=>$employee->employee_category_id));
							  if($cat!=NULL)
							  {
							  echo $cat->name;	
							  }
							  ?>
						</td>
                        <?php /*?><td><strong><?php echo Yii::t('teachersportal','City');?></strong></td>
                        <td><?php echo $employee->home_city; ?></td><?php */?>
                      </tr>
                    
                      <tr>
                        <td ><strong><?php echo Yii::t('teachersportal','Position');?></strong></td>
                        <td><?php $pos=EmployeePositions::model()->findByAttributes(array('id'=>$employee->employee_position_id));
							  if($pos!=NULL)
							  {
							  echo $pos->name;	
							  }
							  ?>
						</td>
                         <td ><strong><?php echo Yii::t('teachersportal','Grade');?></strong></td>
                        <td><?php $grd=EmployeeGrades::model()->findByAttributes(array('id'=>$employee->employee_grade_id));
							  if($grd!=NULL)
							  {
							  echo $grd->name;	
							  }
							  ?>
						</td>
                        
                      </tr>
                      <tr>
                      	<td><strong><?php echo Yii::t('teachersportal','Date of Birth');?></strong></td>
                        <td><?php 
						if($employee->date_of_birth)
						{
							if($settings!=NULL)
							{
								$employee->date_of_birth=date($settings->displaydate,strtotime($employee->date_of_birth));
							}
							echo $employee->date_of_birth;
						}
						?></td>
                        <td><strong><?php echo Yii::t('teachersportal','Gender');?></strong></td>
                        <td>
                        <?php if($student->gender=='M')
							echo 'Male';
							else 
							echo 'Female'; ?></td>
                        <?php /*?><td> <strong><?php echo Yii::t('teachersportal','Birth Place');?></strong></td>
                        <td><?php echo $student->birth_place; ?></td><?php */?>
                        
                      </tr>
                      <tr>
                      	<td><strong><?php echo Yii::t('teachersportal','Blood Group');?></strong></td>
                        <td><?php echo $employee->blood_group; ?></td>
                        <td><strong><?php echo Yii::t('teachersportal','Nationality');?></strong></td>
                        <td><?php $natio_id=Countries::model()->findByAttributes(array('id'=>$employee->nationality_id));
								echo $natio_id->name; ?></td>
                        <?php /*?><td><strong><?php echo Yii::t('teachersportal','State');?></strong></td>
                        <td><?php echo $employee-> 	home_state; ?></td><?php */?>
                        <?php /*?><td><strong><?php echo Yii::t('teachersportal','Country');?></strong></td>
                        <td><?php $count = Countries::model()->findByAttributes(array('id'=>$student->country_id));
							if(count($count)!=0)
							echo $count->name;  ?></td><?php */?>
                      </tr>
                      <tr>
                      	<td><strong><?php echo Yii::t('teachersportal','Gender');?></strong></td>
                        <td>
                        <?php if($employee->gender=='M')
							echo 'Male';
							else 
							echo 'Female'; ?></td>
                        <td><strong><?php echo Yii::t('teachersportal','Qualification');?></strong></td>
                        <td><?php echo $employee->qualification; ?></td>
                      </tr>
                      <tr>
                      	<td><strong><?php echo Yii::t('teachersportal','Experience');?>  </strong></td>
                        <td>
							<?php 
                            if($employee->experience_year and !$employee->experience_month)
                                echo $employee->experience_year.' year(s)';
                            elseif(!$employee->experience_year and $employee->experience_month)
                                echo ' '.$employee->experience_month.' month(s)';
                            elseif($employee->experience_year and $employee->experience_month)
                                echo $employee->experience_year.' year(s) and '.$employee->experience_month.' month(s)';
                            else
                                echo '-';
                            ?>
                        </td>
                       <?php /*?> <td><strong><?php echo Yii::t('teachersportal','Pin Code');?>  </strong></td>
                        <td><?php echo $student->pin_code; ?></td><?php */?>
                        <?php 
						if($employee->experience_detail!=NULL){ ?>
						<td><strong><?php echo Yii::t('teachersportal','Experience Detail');?>  </strong></td>	
                        <td><?php echo $employee->experience_detail;?></td>	
						<?php }else{
						?>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <?php } ?>
                      </tr>
                      <tr>
                        <td><strong><?php echo Yii::t('teachersportal','Home Address Line 1');?>  </strong></td>
                        <td><?php echo $employee->home_address_line1; ?></td>
                        <td><strong><?php echo Yii::t('teachersportal','Home Address Line 2');?></strong></td>
                        <td><?php echo $employee->home_address_line2; ?></td>
                      </tr>
                       <tr>
                        <td><strong><?php echo Yii::t('teachersportal','Home City');?>  </strong></td>
                        <td><?php echo $employee->home_city; ?></td>
                        <td><strong><?php echo Yii::t('teachersportal','Home State');?></strong></td>
                        <td><?php echo $employee->home_state; ?></td>
                      </tr>
                      <tr>
                        <td><strong><?php echo Yii::t('teachersportal','Home Country');?>  </strong></td>
                        <td><?php $count = Countries::model()->findByAttributes(array('id'=>$employee->home_country_id));
							if(count($count)!=0)
							echo $count->name;  ?></td>
                        <td><strong><?php echo Yii::t('teachersportal','Home Pin');?></strong></td>
                        <td><?php echo $employee->home_pin_code; ?></td>
                      </tr>
                       <tr>
                        <td><strong><?php echo Yii::t('teachersportal','Office Address Line 1');?>  </strong></td>
                        <td><?php echo $employee->office_address_line1; ?></td>
                        <td><strong><?php echo Yii::t('teachersportal','Office Address Line 2');?></strong></td>
                        <td><?php echo $employee->office_address_line2; ?></td>
                      </tr>
                       <tr>
                        <td><strong><?php echo Yii::t('teachersportal','Office City');?>  </strong></td>
                        <td><?php echo $employee->office_city; ?></td>
                        <td><strong><?php echo Yii::t('teachersportal','Office State');?></strong></td>
                        <td><?php echo $employee->office_state; ?></td>
                      </tr>
                      <tr>
                        <td><strong><?php echo Yii::t('teachersportal','Office Country');?>  </strong></td>
                        <td><?php $count = Countries::model()->findByAttributes(array('id'=>$employee->office_country_id));
							if(count($count)!=0)
							echo $count->name;  ?></td>
                        <td><strong><?php echo Yii::t('teachersportal','Office Pin');?></strong></td>
                        <td><?php echo $employee->office_pin_code; ?></td>
                      </tr>
                      <tr>
                        <td><strong><?php echo Yii::t('teachersportal','Office Phone 1');?></strong></td>
                        <td><?php echo $employee->office_phone1; ?></td>
                        <td><strong><?php echo Yii::t('teachersportal','Office Phone 2');?></strong></td>
                        <td><?php echo $employee->office_phone2; ?></td>
                      </tr>
                     <tr>
                        <td><strong><?php echo Yii::t('teachersportal','Mobile Phone');?></strong></td>
                        <td><?php echo $employee->mobile_phone; ?></td>
                        <td><strong><?php echo Yii::t('teachersportal','Home Phone');?></strong></td>
                        <td><?php echo $student->home_phone; ?></td>
                      </tr>
                      <tr>
                        <td><strong><?php echo Yii::t('teachersportal','Email');?></strong></td>
                        <td><?php echo $employee->email; ?></td>
                        <td><strong><?php echo Yii::t('teachersportal','Fax');?></strong></td>
                        <td><?php echo $employee->fax; ?></td>
                      </tr>
                      <tr>
                        <td><strong><?php echo Yii::t('teachersportal','Marital Status');?></strong></td>
                        <td><?php echo $employee->marital_status; ?></td>
                        <td><strong><?php echo Yii::t('teachersportal','Children');?></strong></td>
                        <td><?php echo $employee->children_count; ?></td>
                      </tr>
                      <tr>
                        <td><strong><?php echo Yii::t('teachersportal','Father\'s Name');?></strong></td>
                        <td><?php echo $employee->father_name; ?></td>
                        <td><strong><?php echo Yii::t('teachersportal','Mother\'s Name');?></strong></td>
                        <td><?php echo $employee->mother_name; ?></td>
                      </tr>
                      <tr>
                        <td><strong><?php echo Yii::t('teachersportal','Husband\'s Name');?></strong></td>
                        <td><?php echo $employee->husband_name; ?></td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                      </tr>
                    
                      
                      
                      </tbody>
                     </table>

                </div>
            </div>
        </div>
        <div class="clear"></div>
      </div>
      <!--innersection ends here-->
