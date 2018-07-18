<?php
if(!isset($do)){
	$do='';
}

switch($do)
{	
	case 'page_priority':include("module/$mod/revolution_page_priority.php");
	break;
	default:
		echo "page not found";


}
?>
