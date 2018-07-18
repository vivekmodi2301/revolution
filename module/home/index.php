<?php
	if (!isset($do)) {
		$do='';
	}
	switch ($do) {
		case 'home':
			include("module/$mod/revolution_home.php");
			break;
		
		default:
			include("404.php");
			break;
	}
?>