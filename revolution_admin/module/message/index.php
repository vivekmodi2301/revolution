<?php
if(!isset($do)){
	$do='';
}

switch($do)
{	
	case 'addedit':include("module/$mod/revolution_addedit.php");
	break;
	case 'edit':include("module/$mod/revolution_edit.php");
	break;
	case '':
	case 'list': include("module/$mod/revolution_list.php");
					break;
	default:
			echo "page not found";


}
?>
