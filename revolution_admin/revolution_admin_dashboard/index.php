<?php

session_start();
ob_start(); 
if(!isset($_SESSION['logindtl'])){
  header("location:../index.php");
}
//echo md5("9024555623");
$in=glob('include/php/*.php');
foreach($in as $file)
{
	include_once($file);
}
	include_once("header.php");
$mod="student";
$do="list";
if(isset($_GET['mod']))
  {
    $mod=$_GET['mod'];
    if(isset($_GET['do']) && $_GET['do']){
    	$do=$_GET['do'];
    }else{
    	$do="index";
    }
  }
  

  if (file_exists("module/$mod/index.php")) {
  	include("module/$mod/index.php");
	}

	
	include_once("footer.php");

?>	