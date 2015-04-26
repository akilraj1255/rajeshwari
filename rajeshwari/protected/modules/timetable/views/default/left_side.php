<div align="left" id="othleft-sidebar">
    <!--<div class="lsearch_bar">
    <input type="text" value="Search" class="lsearch_bar_left" name="">
    <input type="button" class="sbut" name="">
    <div class="clear"></div>
    </div>-->
    
    <h1><?php echo Yii::t('timetable','View Timetable'); ?></h1>
    <ul>
		<?php 
		if(isset($_REQUEST['id']) and $_REQUEST['id']!=NULL)
        { 
		?>
			<?php 
            if(Yii::app()->controller->action->id=='timetable' and isset($_REQUEST['type'])  and $_REQUEST['type']=='view')
            {
            ?>
                <li class="list_active">
                    <?php echo CHtml::link(Yii::t('timetable','View Timetable').'<span>'.Yii::t('timetable','View Batch wise Timetable').'</span>',array('/timetable/weekdays/timetable','id'=>$_REQUEST['id'],'type'=>'view'),array('class'=>'sbook_ico'));
                    ?>
                </li>
            <?php 
			}
            else
            {
			?>
                <li>
                    <?php echo CHtml::link(Yii::t('timetable','View Timetable').'<span>'.Yii::t('timetable','View Batch wise Timetable').'</span>',array('/timetable/weekdays/timetable','id'=>$_REQUEST['id'],'type'=>'view'),array('class'=>'sbook_ico'));?>
                </li>
			<?php
            }?>
         
        <?php 
		}
        else
        {
		?>
            <li>
            	<?php echo CHtml::ajaxLink(Yii::t('timetable','View Timetable').'<span>'.Yii::t('timetable','View Batch wise Timetable').'</span>',array('/site/explorer','widget'=>'2','rurl'=>'timetable/weekdays/timetable'),array('update'=>'#explorer_handler'),array('id'=>'explorer_timetable','class'=>'vt_ico')); ?>
            </li>
        <?php 
		}
		?>
         <?php 
            if(Yii::app()->controller->action->id=='fulltimetable')
            {
            ?>
                <li class="list_active">
                    <?php echo CHtml::link(Yii::t('timetable','View Full Timetable').'<span>'.Yii::t('timetable','View Full Timetable').'</span>',array('/timetable/weekdays/fulltimetable'),array('class'=>'vft_ico'));
                    ?>
                </li>
            <?php 
			}
            else
            {
			?>
                <li>
                    <?php echo CHtml::link(Yii::t('timetable','View Full Timetable').'<span>'.Yii::t('timetable','View Full Timetable').'</span>',array('/timetable/weekdays/fulltimetable'),array('class'=>'vft_ico'));?>
                </li>
			<?php
            }?>
        
        <h1><?php echo Yii::t('timetable','Manage Timetable');?></h1>
        <?php 
		if(isset($_REQUEST['id']) and $_REQUEST['id']!=NULL)
        {
		?>
			<?php 
            if(Yii::app()->controller->action->id=='timetable' and $_REQUEST['type']==NULL)
            {
            ?>
                <li class="list_active">
                    <?php echo CHtml::link(Yii::t('timetable','Set Timetable').'<span>'.Yii::t('timetable','Timetable For The Batch').'</span>',array('/timetable/weekdays/timetable','id'=>$_REQUEST['id']),array('class'=>'set_t_ico'));
                ?>
                </li>
            <?php 
            }
            else
            {
            ?>
                <li>
                    <?php echo CHtml::link(Yii::t('timetable','Set Timetable').'<span>'.Yii::t('timetable','Timetable For The Batch').'</span>',array('/timetable/weekdays/timetable','id'=>$_REQUEST['id']),array('class'=>'sbook_ico'));?>
                </li>
            <?php 
            }
            if(Yii::app()->controller->id=='weekdays' and $_REQUEST['type']==NULL and Yii::app()->controller->action->id!='timetable')
            { 
            ?>
                <li class="list_active">
                    <?php echo CHtml::link(Yii::t('timetable','Set Weekdays').'<span>'.Yii::t('timetable','Weekdays For The Batch').'</span>',array('/timetable/weekdays','id'=>$_REQUEST['id']),array('class'=>'lbook_ico'));
                ?>
                </li>
            <?php 
            }
            else
            {
            ?>
                <li>
                    <?php echo CHtml::link(Yii::t('timetable','Set Weekdays').'<span>'.Yii::t('timetable','Weekdays For The Batch').'</span>',array('/timetable/weekdays','id'=>$_REQUEST['id']),array('class'=>'lbook_ico'));
            ?>
                </li>
            <?php
            }
            ?>
            <?php 
            if(Yii::app()->controller->id=='classTiming')
            {
            ?>
                <li class="list_active">
                <?php echo CHtml::link(Yii::t('timetable','Set Class Timing').'<span>'.Yii::t('timetable','Class Timing For The Batch').'</span>',array('/timetable/classTiming','id'=>$_REQUEST['id']),array('class'=>'abook_ico'));
                ?>
                </li>
            
            <?php 
            }
            else
            {
            ?>
                <li>
                    <?php echo CHtml::link(Yii::t('timetable','Set Class Timing').'<span>'.Yii::t('timetable','Class Timing For The Batch').'</span>',array('/timetable/classTiming','id'=>$_REQUEST['id']),array('class'=>'abook_ico'));
                ?>
                </li>
            <?php 
            }
            ?>
        
            <?php 
            if(Yii::app()->controller->id=='weekdays' and isset($_REQUEST['type']) and  $_REQUEST['type']== 'default')
            {
            ?>
                <li class="list_active">
                    <?php echo CHtml::link(Yii::t('timetable','Set Default Weekdays').'<span>'.Yii::t('timetable','Default Weekdays For The Institution').'</span>',array('/timetable/weekdays','type'=>'default','id'=>$_REQUEST['id']),array('class'=>'abook_ico')); ?>
                </li>
            <?php
            }
            else
            {
            ?>
                <li> 
                    <?php echo CHtml::link(Yii::t('timetable','Set Default Weekdays').'<span>'.Yii::t('timetable','Default Weekdays For The Institution').'</span>',array('/timetable/weekdays','type'=>'default','id'=>$_REQUEST['id']),array('class'=>'abook_ico','active'=>Yii::app()->controller->id=='weekdays'));
                ?>
                </li>
            <?php 
            } 
            ?>
            
        <?php 
		}
        else
        {
		?>
            <li>
            <?php 
            echo CHtml::ajaxLink(Yii::t('timetable','Set Timetable').'<span>'.Yii::t('timetable','Timetable For The Batch').'</span>',array('/site/explorer','widget'=>'2','rurl'=>'timetable/weekdays/timetable'),array('update'=>'#explorer_handler'),array('id'=>'explorer_timetable','class'=>'set_t_ico','active'=>Yii::app()->controller->id=='weekdays'));
            ?>
            </li>
            
            <li>
            <?php echo CHtml::ajaxLink(Yii::t('timetable','Set Weekdays').'<span>'.Yii::t('timetable','Weekdays For The Batch').'</span>',array('/site/explorer','widget'=>'2','rurl'=>'timetable/weekdays'),array('update'=>'#explorer_handler'),array('id'=>'explorer_weekdays','class'=>'set_w_ico','active'=>Yii::app()->controller->id=='weekdays')); ?>
            </li>
            
            <li>
            <?php echo CHtml::ajaxLink(Yii::t('timetable','Set Class Timing').'<span>'.Yii::t('timetable','Class Timing For The Batch').'</span>',array('/site/explorer','widget'=>'2','rurl'=>'timetable/classTiming'),array('update'=>'#explorer_handler'),array('id'=>'explorer_classTiming','class'=>'set_ct_ico','active'=>Yii::app()->controller->id=='classTiming')); ?>
            </li>
            <?php 
			if(Yii::app()->controller->id=='weekdays' and Yii::app()->controller->action->id!='fulltimetable')
            {
			?>
                <li class="list_active"> 
                	<?php echo CHtml::link(Yii::t('timetable','Set Default Weekdays').'<span>'.Yii::t('timetable','Default Weekdays For The Institution').'</span>',array('/timetable/weekdays','type'=>'default'),array('class'=>'set_dw_ico','active'=>Yii::app()->controller->id=='weekdays'));
                ?>
                </li>
            <?php 
			}
            else
            {  ?>
                <li>
                	<?php echo CHtml::link(Yii::t('timetable','Set Default Weekdays').'<span>'.Yii::t('timetable','Default Weekdays For The Institution').'</span>',array('/timetable/weekdays','type'=>'default'),array('class'=>'set_dw_ico','active'=>Yii::app()->controller->id=='weekdays'));
                ?>
                </li>
            <?php 
			}
			?>
        <?php 
		}
		?>
    </ul>
</div>