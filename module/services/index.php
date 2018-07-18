<?php
	if (!isset($do)) {
		$do='';
	}
	switch ($do) {
		case 'services':
			include("module/$mod/revolution_services.php");
			break;
		
		default:
			include("404.php");
			break;
	}
?>