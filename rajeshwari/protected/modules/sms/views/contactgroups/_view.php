<div class="contact_box" data-group-id="<?php echo $data->id;?>">
<div class="contact_box_group"></div>
	
	<h3><?php echo CHtml::encode($data->group_name); ?></h3>
    <div class="cont_set">
    <p class="phone_icon_co"><?php 
		//total contacts
		$criteria	= new CDbCriteria;
		$criteria->condition	= '`group_id`=:group_id';
		$criteria->params		= array(':group_id'=>$data->id);
		$contacts	= ContactsList::model()->findAll($criteria);
		echo CHtml::encode(count($contacts)).' contacts'; 
	?></p>
    <p class="time_icon_co"><?php echo CHtml::encode($data->created_at); ?></p>
   
    </div>
    <div class="con_bottom">    
    	<div style="margin:2px 0px 0 8px">			
            <?php echo CHtml::link(Yii::t('os_sms_module','Edit'), array('update', 'id'=>$data->id),array('class'=>'formbut_yellow'));?>
			<?php echo CHtml::link(Yii::t('os_sms_module','Delete'), array('delete', 'id'=>$data->id),array('class'=>'formbut_yellow', 'confirm'=>'Are you sure ?'));?>
            <?php echo CHtml::link(Yii::t('os_sms_module','Contacts'), array('/sms/contacts', 'group'=>$data->id),array('class'=>'formbut_yellow'));?>
        </div>
    </div>
</div>
    

