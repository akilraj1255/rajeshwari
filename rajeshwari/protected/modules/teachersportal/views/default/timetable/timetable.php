<?php Yii::app()->clientScript->registerCoreScript('jquery');?>

<div id="parent_Sect">
	<?php $this->renderPartial('leftside');?> 
	<div class="right_col"  id="req_res123">
    <!--contentArea starts Here--> 
    <?php
		$employee=Employees::model()->findByAttributes(array('uid'=>Yii::app()->user->id));
		$is_classteacher = Batches::model()->findAllByAttributes(array('employee_id'=>$employee->id));
		$stud_flag = 0;
		if($is_classteacher!=NULL){
			$stud_flag = 1;
		}
	  ?>
     <div id="parent_rightSect">
        <div class="parentright_innercon">
            <h1><?php echo Yii::t('teachersportal','View Time Table'); ?></h1>
            <?php $this->renderPartial('/default/employee_tab');?>
        	<br />
                <div class="yellow_bx" style="background-image:none;width:90%;padding-bottom:45px;">
                    <?php /*?><div class="y_bx_head" style="font-size:14px;">
                       &nbsp;
                    </div><?php */?>
                    <div class="y_bx_list timetable_list">
                    	<h2><?php echo Yii::t('teachersportal','View My Timetable'); ?></h2>
                        <p><?php echo Yii::t('teachersportal','Displays your timetable.'); ?></p>
                    </div> 
                    <?php 
					if($stud_flag == 1){
					?>
                    <div class="y_bx_list timetable_list">
                    	<h2><?php echo Yii::t('teachersportal','View Class Timetable'); ?></h2>
                        <p><?php echo Yii::t('teachersportal','View the timetable for the class(es) that you are in charge.'); ?></p>
                    </div>
                     <div class="yb_timetable">&nbsp;</div>    
                    <?php
					}
					?>
                    <div class="yb_teacher_timetable">&nbsp;</div>
                     
       			</div>
		</div>
	</div>
	 <div class="clear"></div>
</div>
