<div id="parent_Sect">
	<?php 
    $this->renderPartial('leftside');
	
    $guardian = Guardians::model()->findByAttributes(array('uid'=>Yii::app()->user->id));    
    $students = Students::model()->findAllByAttributes(array('parent_id'=>$guardian->id));  
	  
    $settings=UserSettings::model()->findByAttributes(array('user_id'=>1));
    ?>
    <div id="parent_rightSect">
        <div class="parentright_innercon">
            <h1><?php echo Yii::t('parentportal','Profile');?></h1>
            <div class="parent_profile_top">
                <h2><?php echo ucfirst($guardian->first_name.' '.$guardian->last_name);?></h2>
                <ul>
                    <li class="rleft"><?php echo ucfirst($guardian->relation).' of :';?></li>
                    <li>
                    <?php
                    foreach($students as $student)
					{
						echo CHtml::link(ucfirst($student->first_name).' '.ucfirst($student->middle_name).' '.ucfirst($student->last_name), array('/parentportal/default/studentprofile','id'=>$student->id),array('style' => 'color:#fff;')).'&nbsp;&nbsp;&nbsp;';
					}
					?>
                    </li>
                </ul>
            </div> <!-- END div class="profile_top" -->
            <div class="profile_details">
                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tbody>
                        <tr>
                            <td><strong><?php echo Yii::t('parentportal','Email');?></strong></td>
                            <td><?php echo $guardian->email; ?></td>
                            <td><strong><?php echo Yii::t('parentportal','Mobile Phone');?></strong></td>
                            <td><?php echo $guardian->mobile_phone; ?></td>
                        </tr>
                        
                        <tr>
                            <td><strong><?php echo Yii::t('parentportal','Occupation');?></strong></td>
                            <td>
							<?php 
							if($guardian->occupation)
							{
								echo $guardian->occupation;
							}
							else
							{
								echo '-';
							}
							?>
                            </td>
                            <td><strong><?php echo Yii::t('parentportal','Income');?></strong></td>
                            <td>
							<?php 
							if($guardian->income)
							{
								echo $guardian->income;
							}
							else
							{
								echo '-';
							}
							?>
                            </td>
                        </tr>
                        
                        <tr>
                            <td><strong><?php echo Yii::t('parentportal','Education');?></strong></td>
                            <td>
							<?php 
							if($guardian->education)
							{
								echo $guardian->education;
							}
							else
							{
								echo '-';
							}
							?>
                            </td>
                            <td><strong><?php echo Yii::t('parentportal','Date of Birth');?></strong></td>
                            <td>
							<?php 
							if($guardian->dob)
							{
								if($settings!=NULL)
								{
									$guardian->dob = date($settings->displaydate,strtotime($guardian->dob));
								}
								echo $guardian->dob;
							}
							else
							{
								echo '-';
							}
							?>
                            </td>
                        </tr>
                        
                        <tr>
                            <td><strong><?php echo Yii::t('parentportal','Office Phone 1');?></strong></td>
                            <td>
							<?php 
							if($guardian->office_phone1)
							{
								echo $guardian->office_phone1;
							}
							else
							{
								echo '-';
							}
							?>
                            </td>
                            <td><strong><?php echo Yii::t('parentportal','Office Phone 2');?></strong></td>
                            <td>
							<?php 
							if($guardian->office_phone2)
							{
								echo $guardian->office_phone2;
							}
							else
							{
								echo '-';
							}
							?>
                            </td>
                        </tr>
                        
                        <tr>
                            <td><strong><?php echo Yii::t('parentportal','Office Address Line 1');?></strong></td>
                            <td>
							<?php 
							if($guardian->office_address_line1)
							{
								echo $guardian->office_address_line1;
							}
							else
							{
								echo '-';
							}
							?>
                            </td>
                            <td><strong><?php echo Yii::t('parentportal','Office Address Line 2');?></strong></td>
                            <td>
							<?php 
							if($guardian->office_address_line2)
							{
								echo $guardian->office_address_line2;
							}
							else
							{
								echo '-';
							}
							?>
                            </td>
                        </tr>
                        
                        <tr>
                            <td><strong><?php echo Yii::t('parentportal','City');?></strong></td>
                            <td>
							<?php 
							if($guardian->city)
							{
								echo $guardian->city;
							}
							else
							{
								echo '-';
							}
							?>
                            </td>
                            <td><strong><?php echo Yii::t('parentportal','State');?></strong></td>
                            <td>
							<?php 
							if($guardian->state)
							{
								echo $guardian->state;
							}
							else
							{
								echo '-';
							}
							?>
                            </td>
                        </tr>
                        
                        <tr>
                            <td><strong><?php echo Yii::t('parentportal','Country');?></strong></td>
                            <td>
							<?php 
							if($guardian->country_id)
							{
								$country = Countries::model()->findByAttributes(array('id'=>$guardian->country_id));
								if($country)
								{
									echo $country->name;
								}
								else
								{
									echo '-';
								}
							}
							else
							{
								echo '-';
							}
							?>
                            </td>
                            <td colspan="2">&nbsp;</td>
                        </tr>
                    </tbody>
                </table>
            </div> <!-- END div class="profile_details" -->
        </div> <!-- END div class="parentright_innercon" -->
    </div> <!-- END div id="parent_rightSect" -->
    <div class="clear"></div>
</div> <!-- END div id="parent_Sect" -->

