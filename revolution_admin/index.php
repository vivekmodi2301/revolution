<?php
session_start();
ob_start(); 
//echo md5("9024555623");
$in=glob('system/php/*.php');
foreach($in as $file)
{
	include_once($file);
}

include_once("headar.php");//exit;
$mod='login';
$do='login';

if(isset($_SESSION['logindtl'])){
	
	if(isset($_GET['mod']) && $_GET['do']!='login')
	{
		$mod=$_GET['mod'];
		$do=(isset($_GET['do']))?$_GET['do']:'';
	}
	else{
		$mod="slider";
		$do="list";	
	}
}


if(is_file("module/$mod/index.php")){
include_once("module/$mod/index.php");
}else{
	echo "Not found";
	}
// 	echo $mod.$do;
include_once("footer.php");
?>