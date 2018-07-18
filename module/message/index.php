<?php
	if (!isset($do)) {
		$do='';
	}
	switch ($do) {
		case 'message':
			include("module/$mod/revolution_message.php");
			break;
		
		default:
			include("404.php");
			break;
	}
?>