<?php
$this->breadcrumbs=array(
	'Room Details'=>array('index'),
	'Manage',
);

?>
 <table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="247" valign="top">
    <?php $this->renderPartial('/settings/hostel_left');?>
 </td>
    <td valign="top"> 
    <div class="cont_right">
<h1>Manage Room Details</h1>

<div class="pdtab_Con">
<?php
$bedinfo=RoomDetails::model()->findAll();
if($bedinfo!=NULL)
{
	?>
    <table width="100%" cellpadding="0" cellspacing="0" border="0" >
<tr class="pdtab-h">
<td align="center">Room No</td>
<td align="center">Floor</td>
<td align="center">Bed No</td>
<td align="center">Available</td>
</tr>
<?php
foreach($bedinfo as $bed_info)
{
	?>
    <tr>
    <td align="center"><?php echo $bed_info->room_no; ?></td>
	<td align="center"><?php 
	$floor=Floor::model()->findByAttributes(array('id'=>$bed_info->no_of_floors));
	echo $floor->floor_no; ?></td>
	<td align="center"><?php echo $bed_info->bed_no; ?></td>
	<?php 
	if($bed_info->status=='C')
	{
		echo '<td align="center">Yes</td>';
	}
	else
	{
	echo '<td align="center" >No</td>';
	}?>
    </tr>
    <?php
}
?>
    <?php
}

?>
</table>
</div>
 </div>     
                        </td>
                        </tr>
                        </table>