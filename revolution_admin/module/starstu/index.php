<?php
	$do=(isset($do)?$do:'');

	switch ($do) {
		case 'addedit':
			include_once("module/$mod/revolution_addedit.php");
			break;
		case 'list':
			include_once("module/$mod/revolution_list.php");
			break;
		default:
			echo "page not found";
			break;
	}
?>