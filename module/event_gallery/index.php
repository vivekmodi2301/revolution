<?php
	if (!isset($do)) {
		$do='';
	}
	switch ($do) {
		case 'event':
			include("module/$mod/revolution_event_gallery.php");
			break;
		
		default:
			include("404.php");
			break;
	}
?>