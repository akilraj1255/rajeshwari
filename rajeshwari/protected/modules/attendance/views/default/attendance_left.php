<div align="left" id="othleft-sidebar">
<!--<div class="lsearch_bar">
             	<input type="text" value="Search" class="lsearch_bar_left" name="">
                <input type="button" class="sbut" name="">
                <div class="clear"></div>
  </div>-->
<h1>Attendance Register</h1>
 <ul>
 <li><?php echo CHtml::link('Employee Register<span>Employee Attendance Register</span>',array('#'),array('class'=>'sbook_ico'));
?>
</li>
 <li><?php echo CHtml::link('Student Register<span>Student Attendance Register</span>',array('#'),array('class'=>'lbook_ico'));
?>
</li>
<h1>Attendance Reports</h1>
 <li>
<?php echo CHtml::link('Employee Attendance<span>Employee Attendance Report</span>',array('#'),array('class'=>'abook_ico'));
?>
<?php echo CHtml::link('Student Attendance<span>Student Attendance Report</span>',array('#'),array('class'=>'abook_ico'));
?>
</li>
 <h1>Employee Attendance Settings</h1>
 <li>
<?php echo CHtml::link('Add Leave Type<span>Manage Employee Leave Type</span>',array('#'),array('class'=>'abook_ico'));
?>
</li>

</ul>

</div>