<?php
	if (!isset($do)) {
		$do='';
	}
	switch ($do) {
		case 'contact':
			include("module/$mod/revolution_contact.php");
			break;
		
		default:
			include("404.php");
			break;
	}
?>