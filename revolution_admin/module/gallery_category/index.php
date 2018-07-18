<?php
if(!isset($do)){
	$do='';
}
switch($do)
{	
	case 'school_addedit':include("module/$mod/revolution_school_addedit.php");
		break;
	case 'school_list': include("module/$mod/revolution_school_list.php");
		break;
	case 'event_addedit':include("module/$mod/revolution_event_addedit.php");
		break;
	case 'event_list': include("module/$mod/revolution_event_list.php");
		break;
	default:
			echo "page not found";


}
?>
