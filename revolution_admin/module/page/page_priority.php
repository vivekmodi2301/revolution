<?php 
    session_start();
    ob_start();  
    include_once("../../system/php/config.php");
    include_once("../../system/php/function.php");
    extract($_POST);
    if(isset($_POST['page_name'])){
      $page_nm = array();
      $page_nm=explode(",",$page_name);
      foreach ($page_nm as $key=>$value) {
        $data=array();
        $data['priority']=$key+1;
        addUpdate_page_priority('pages_priority',$data,$value,'u');
      }
    }
    
    if(isset($_POST['not_selected']))
    {
      $not_select = array();
      $not_select=explode(",",$not_selected);
      foreach ($not_select as $value) {
        $data=array();
        $data['priority']=0;
        addUpdate_page_priority('pages_priority',$data,$value,'u');
      }
    }

?>