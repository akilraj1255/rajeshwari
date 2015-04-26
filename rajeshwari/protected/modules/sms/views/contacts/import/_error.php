<?php
switch($error){
	case 0:
		echo '<span class="error">Invalid request</span>';
	break;
	case 1:
	?>
	<h2>Not an allowed file format</h2>
	<?php
	$allowedformats	= array();
	if(Contacts::model()->import_contacts_config()){
		$import_config		= Contacts::model()->import_contacts_config();
		if($import_config['allowed_file_formats']){
			$allowedformats	= $import_config['allowed_file_formats'];
		}
	}
	
	if(count($allowedformats)>0){
		echo '<p>Allowed file formats : </p>';
		foreach($allowedformats as $format){
			echo '<b>.'.$format.'</b><br/>';
		}
	}
	
	break;
	case 2:
		echo '<span class="error">Please select required fields</span>';
	break;
}
?>