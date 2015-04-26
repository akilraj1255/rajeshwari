<?php $this->breadcrumbs=array(
	'Transportations'=>array('/transport'),
	'viewall',
	
);?>


<table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
        <td width="247" valign="top">
            <?php $this->renderPartial('/transportation/trans_left');?>
        </td>
        <td valign="top">
            <div class="cont_right">
                <h1>
                    <?php echo Yii::t('transport','Transportation');?>
                </h1>
                <div class="pdtab_Con">
                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                        <tr class="pdtab-h">
                            <td align="center">
                                <?php echo Yii::t('transport','Student Name');?>
                            </td>
                            <td align="center">
                                <?php echo Yii::t('transport','Route');?>
                            </td>
                            <td align="center">
                                <?php echo Yii::t('transport','Stop');?>
                            </td>
                            <td align="center">
                                <?php echo Yii::t('transport','Fare');?>
                            </td>
                            <td align="center">
                                <?php echo Yii::t('transport','Action');?>
                            </td>
                        </tr>
                        <tr>
                        <?php
		
							$criteria = new CDbCriteria;
							$criteria->order = 'id DESC';
							$total = Transportation::model()->count($criteria);
							$pages = new CPagination($total);
							$pages->setPageSize(Yii::app()->params['listPerPage']);
							$pages->applyLimit($criteria);  // the trick is here!
							$route = Transportation::model()->findAll($criteria);
							$page_size=Yii::app()->params['listPerPage'];
							?>
								<?php 
		                       //$route=Transportation::model()->findAll();
							   if($route)
							   {
								foreach($route as $route1) 
								{
							         $student=Students::model()->findByAttributes(array('id'=>$route1->student_id));
									 $stop=StopDetails::model()->findByAttributes(array('id'=>$route1->stop_id));
									 $route=RouteDetails::model()->findByAttributes(array('id'=>$stop->route_id));
							?>	
 
                            <td align="center">
                                <?php echo $student->last_name.' '.$student->first_name;?>
                            </td>
                            <td align="center">
                                <?php echo $route->route_name;?>
                            </td>
                            <td align="center">
                                <?php echo $stop->stop_name;?>
                            </td>
                            <td align="center">
                                <?php echo $stop->fare;?>
                            </td>
                           <td align="center">
	<?php

					if($route1->is_paid=='0')
						{
	
							echo CHtml::link(Yii::t('hostel','Pay Fees'),array('/transport/Transportation/Payfees','id'=>$route1->student_id),array('confirm'=>'Are you sure?'));
						}
					else
					{
						echo Yii::t('hostel','Paid');	
 					    echo CHtml::link(' Print Receipt',array('/transport/Transportation/print','id'=>$route1->student_id),array('target'=>'_blank')); 
        
					}
				
		?>
				</td>
                        </tr>
                       <?php
								}
							   }
							   else
	                         {
		               echo '<tr><td align="center" colspan="6"><strong>'.Yii::t('transport','No data available.').'</strong></div>';
	                            }
								?>
                    </table>
                    <div class="pagecon">
                                                 <?php 
	                                                  $this->widget('CLinkPager', array(
													  'currentPage'=>$pages->getCurrentPage(),
													  'itemCount'=>$total,
													  'pageSize'=>$page_size,
													  'maxButtonCount'=>5,
													  //'nextPageLabel'=>'My text >',
													  'header'=>'',
												  'htmlOptions'=>array('class'=>'pages'),
												  ));?>
                                                  </div>
                </div>
            </div>
        </td>
    </tr>
</table>



