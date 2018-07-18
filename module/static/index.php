<?php
	if (!isset($do)) {
		$do='';
	}
	switch ($do) {
		case 'static':
			include("module/$mod/revolution_static.php");
			break;
		
		default:
			include("404.php");
			break;
	}
?>