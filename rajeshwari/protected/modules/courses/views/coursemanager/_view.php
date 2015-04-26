<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('user_id')); ?>:</b>
	<?php echo CHtml::encode($data->user_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('course_1')); ?>:</b>
	<?php echo CHtml::encode($data->course_1); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('course_2')); ?>:</b>
	<?php echo CHtml::encode($data->course_2); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('course_3')); ?>:</b>
	<?php echo CHtml::encode($data->course_3); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('course_4')); ?>:</b>
	<?php echo CHtml::encode($data->course_4); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('course_5')); ?>:</b>
	<?php echo CHtml::encode($data->course_5); ?>
	<br />


</div>