<?php

if(!isset($do)){
	$do='';
}
switch($do)
{	
	case '':
	case 'login': include("module/$mod/revolution_login.php");
					break;
	case 'logout':include("module/$mod/revolution_logout.php");
	default:
			echo "page not found";


}
?>
