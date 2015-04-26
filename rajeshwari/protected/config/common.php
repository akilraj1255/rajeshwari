<?php 



	require_once(dirname(__FILE__).'/environment.php');

	return CMap::mergeArray(require(dirname(__FILE__).'/main.php'));
	


?>