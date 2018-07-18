<?php
	if (!isset($do)) {
		$do='';
	}
	switch ($do) {
		case 'school':
			include("module/$mod/revolution_school_gallery.php");
			break;
		
		default:
			include("404.php");
			break;
	}
?>