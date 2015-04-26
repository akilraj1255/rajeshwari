<div class="contact_box" data-contact-id="<?php echo $data->id; ?>">
	<div class="contact_box_image"></div>
    <h3><?php echo CHtml::encode($data->fullname); ?></h3>
    <div class="cont_set">
    <p class="phone_icon_co"><?php echo CHtml::encode($data->mobile); ?></p>
    <p class="mail_icon_co"><?php echo CHtml::encode($data->email); ?></p>
    <p class="time_icon_co"><?php echo CHtml::encode($data->created_at); ?></p>
    </div>
    <div class="con_bottom">    
    	<div style="margin:2px 0px 0 10px">         
    	 <?php echo CHtml::link(Yii::t('os_sms_module','Edit'), array('update', 'id'=>$data->id),array('class'=>'contacts_yellow'));?>
         <?php echo CHtml::link(Yii::t('os_sms_module','Delete'), array('delete', 'id'=>$data->id ),array('class'=>'contacts_yellow', 'confirm'=>'Are you sure ?'));?>
         <?php
		 if(isset($_GET['group']) and $_GET['group']!=""){		//for group contacts only
		 ?>
		 <?php echo CHtml::link(Yii::t('os_sms_module','Remove from group'), '#', array('data-contact-id'=>$data->id, 'class'=>'contacts_yellow remove_from_group'));?>
		 <?php
		 }
		 ?>
        </div>
    </div>
</div>
