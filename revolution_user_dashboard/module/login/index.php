<?php
if(!isset($do)){
	$do='';
}
switch($do)
{	
	case 'login':include("module/$mod/revalution_login.php");
	break;
	case 'logout':include("module/$mod/revalution_logout.php");
	break;
	case 'change_pass':include("module/$mod/revalution_change_password.php");
	break;
	default:
			echo "page not found";


}
?>