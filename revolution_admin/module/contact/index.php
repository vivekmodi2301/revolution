<?php

if(!isset($do)){
	$do='';
}
switch($do)
{	
	case '':
	case 'list': include("module/$mod/revolution_list.php");
					break;
	default:
			echo "page not found";


}
?>
