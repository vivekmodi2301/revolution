<?php
 $phpfiles=glob("include/php/*.php");
 foreach($phpfiles as $phpfile){
 	include_once($phpfile);
 }
 //echo md5(1234);
//error_reporting(false);
//include_once("connection.php");
include_once('header.php');
$mod="home";
$do="home";
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
	}else{
		include "404.php";
	}
include_once('footer.php');
?>
