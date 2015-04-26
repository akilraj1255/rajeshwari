<?php
$this->breadcrumbs=array(
	'Employees'=>array('index'),
	$model->id,
);

?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="247" valign="top">
 <?php $this->renderPartial('profileleft');?>
    
    </td>
    <td valign="top">
    <div class="cont_right formWrapper">
<h1 ><?php echo Yii::t('employees','Employee Profile :');?><?php echo $model->first_name.'&nbsp;'.$model->last_name; ?><br /></h1>
<div class="edit_bttns">
    <ul>
    <li><span><?php echo CHtml::link(Yii::t('employees','Edit'), array('update', 'id'=>$_REQUEST['id']),array('class'=>'edit last')); ?><!--<a class=" edit last" href="">Edit</a>--></span></li>
     <li><span><?php echo CHtml::link(Yii::t('employees','Employees'), array('employees/manage'),array('class'=>'edit last')); ?><!--<a class=" edit last" href="">Edit</a>--></span></li>
    </ul>
    </div>
    
    <div class="emp_right_contner">
    <div class="emp_tabwrapper">
    <div class="emp_tab_nav">
    <ul style="width:698px;">
    <li><?php echo CHtml::link(Yii::t('employees','Profile'), array('view', 'id'=>$_REQUEST['id'])); ?></li>
    <li><?php echo CHtml::link(Yii::t('employees','Address'), array('address', 'id'=>$_REQUEST['id'])); ?></li>
   <li><?php echo CHtml::link(Yii::t('employees','Contact'), array('contact', 'id'=>$_REQUEST['id'])); ?></li>
   
    <li><?php echo CHtml::link(Yii::t('employees','Additional Info'), array('addinfo', 'id'=>$_REQUEST['id'])); ?></li>
     <li><?php echo CHtml::link(Yii::t('employees','Payslip Details'), array('payslip', 'id'=>$_REQUEST['id']),array('class'=>'active')); ?></li>
    </ul>
    </div>
    <div class="clear"></div>
 <div class="emp_cntntbx">
    <div class="table_listbx">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr class="listbxtop_hdng">
    <td><?php echo Yii::t('employees','Payslip Details');?></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td class="listbx_subhdng"><?php echo Yii::t('employees','Salary Date');?></td>
    <td class="subhdng_nrmal"><?php echo $model->salary_date; ?></td>
    
    <td class="listbx_subhdng"><?php echo Yii::t('employees','Bank Name');?></td>
    <td class="subhdng_nrmal"><?php echo $model->bank_name; ?></td>
   
  </tr>

  <tr>
    <td class="listbx_subhdng"><?php echo Yii::t('employees','Bank Account No');?></td>
    <td class="subhdng_nrmal"><?php echo $model->bank_acc_no; ?></td>
    <td class="listbx_subhdng"><?php echo Yii::t('employees','Basic Pay');?></td>
    <td class="subhdng_nrmal"><?php echo $model->basic_pay; ?></td>
  </tr>
  <tr>
    <td class="listbx_subhdng"><?php echo Yii::t('employees','HRA');?></td>
    <td class="subhdng_nrmal"><?php echo $model->HRA; ?></td>
    <td class="listbx_subhdng"><?php echo Yii::t('employees','PF');?></td>
    <td class="subhdng_nrmal"><?php echo $model->PF; ?></td>
  </tr>
  
    <tr>
    <td class="listbx_subhdng"><?php echo Yii::t('employees','TDS');?></td>
    <td class="subhdng_nrmal"><?php echo $model->TDS; ?></td>
    </tr>
  </table>
  <div class="ea_pdf" style="top:4px; right:6px;"><?php //echo CHtml::link('<img src="images/pdf-but.png">', array('Employees/pdf','id'=>$_REQUEST['id'])); ?></div>
   
 </div>
 
 </div>
</div>
</div>
</div>
    
    </td>
  </tr>
</table>