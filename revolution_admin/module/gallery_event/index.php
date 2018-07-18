<?php
if(!isset($do)){
	$do='';
}
switch($do)
{	
	case 'event_gallery_addedit':include("module/$mod/revolution_event_gallery_addedit.php");
		break;
	case 'event_gallery_list': include("module/$mod/revolution_event_gallery_list.php");
		break;
	default:
			echo "page not found";


}
?>
