<?php
session_start();
ob_start();
//echo md5("9024555623");
$in=glob('include/php/*.php');
foreach($in as $file)
{
	include_once($file);
}

if(isset($_SESSION['ulogindtl'])){
  $uid=$_SESSION['ulogindtl']['id'];
  $roll=1;
  $class=fetch("select class_id from student where roll=$roll");
  extract($class);
}

	include_once("header.php");
$mod="login";
$do="login";
if(isset($_SESSION['ulogindtl'])){
  $uid=$_SESSION['ulogindtl']['id'];
  if(isset($_GET['mod']))
  {

    $mod=$_GET['mod'];
    if(isset($_GET['do']) && $_GET['do']!='login'){
    	$do=$_GET['do'];
    }else if($_GET['do']=='login'){
      $mod="student";
      $do="profile";
    }else{
      $do="index";
    }
  }else{

    $mod="student";
    $do="profile";
  }
}

//echo $mod.$do;
  if (file_exists("module/$mod/index.php")) {

  	include("module/$mod/index.php");
	}else{
    echo "hi";
	}

	include_once("footer.php");

?>
