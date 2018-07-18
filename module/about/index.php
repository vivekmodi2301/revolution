<?php
	if (!isset($do)) {
		$do='';
	}
	switch ($do) {
		case 'about':
			include("module/$mod/revolution_about.php");
			break;
		
		default:
			include("404.php");
			break;
	}
?>