<?php
	if (!isset($do)) {
		$do='';
	}
	switch ($do) {
		case 'testimonial':
			include("module/$mod/revolution_testimonial.php");
			break;
		
		default:
			include("404.php");
			break;
	}
?>