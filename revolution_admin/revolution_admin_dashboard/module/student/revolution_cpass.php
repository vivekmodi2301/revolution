<?php
    extract($_GET);
    $pass=md5('1234');
    $data=array('pass'=>$pass);
    addUpdate('student',$data,$id);
    header("location:index.php");
?>