<?php
if(!isset($do)){
	$do='';
}
switch($do)
{	
	case 'school_gallery_addedit':include("module/$mod/revolution_school_gallery_addedit.php");
		break;
	case 'school_gallery_list': include("module/$mod/revolution_school_gallery_list.php");
		break;
	default:
			echo "page not found";


}
?>
