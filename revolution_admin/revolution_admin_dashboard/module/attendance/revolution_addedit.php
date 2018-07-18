<?php
$qry="";
$item=array();
@header('Content-type:text/html; charset=utf-8');
mysqli_query($con,"SET NAMES 'utf8'");
  if(isset($_POST['submit'])){
	  $success=1;
	  extract($_POST);

		if($_POST['datee']==''){
			//echo "hi";
			$success=0;
			$_SESSION['edatee']="Enter Date";
		}else if(!preg_match("/^[0-9.]*$/",$_POST['datee'])){
			$success=0;
			$_SESSION['edatee']="Enter proper Date.";
		}

		/*if($success){
			//echo "hi";exit;
			unset($_POST['submit']);	
			addupdate('test',$_POST);
			header("location:index.php?mod=test&do=list");*/

	  
//print_r($_POST);exit;
    //echo "select name from coloumn where patt_id=$_POST[patteren]";exit;
	//print_r($_SESSION);exit;
	if($success){
		
		if($_FILES['csv']['name']){
			
	/*      $ext=explode('.',$_FILES['csv']['name']);
		  if($ext[1]=='csv'){
		  */
		  if($_FILES['csv']['type']=='application/vnd.ms-excel'){
			  //echo "hi";exit;
			$handle=fopen($_FILES['csv']['tmp_name'],"r");
			while ($data=fgetcsv($handle)) {
				//echo "<pre>";
			  //print_r($data);exit;
			  // $item=array();
			  $j=0;
			  $ccount=count($data);
			  for($c=0;$c<$ccount;$c++){
	
				$item[$j]=mysqli_real_escape_string($con,$data[$c]);
				$j++;
			}
			//$item[0]=md5($item[0]);
			//print_r($item);
			//echo $item[0];
			$set="";
			$count=count($item);
			for($j=0;$j<$count;$j++){
					//echo "hi";
					//echo $item[0];
	
					$set.="'$item[$j]',";}
					$set=substr($set,0,-1);
					
						$sql="insert into $_GET[month] values('','$datee',$set)";
						//echo $sql;exit;
						mysqli_query($con,$sql);
	
		  }
		  //echo $set;exit;
		  $_SESSION['udata']="Data uploaded successfully";
		  
				//echo "hi";exit;
				unset($_POST['submit']);	
	
		  header("location:index.php?mod=attendance&do=addedit&month=$_GET[month]");
	  }
	  }else{
		echo "hii";exit;  
	  }
   }
}
//print_r ($_GET);
/*<?php if(isset($_POST['photo'])){?> title="<?php echo $_POST['photo']['name'];?>" <?php } ?>*/
?>
<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 col-lg-offset-4">
<form role="form" class="form-horizontal" enctype="multipart/form-data" method="post">
	<table class="table table-striped">
		<tr>
			<th colspan="2" style="text-align:center;"><?php 
			$mon=$_GET['month'] ;
			echo strtoupper($mon);?> Attendance</th>
		</tr>
        <tr>
			<th style="widht:50%;">Date</th>
			<td style="widht:50%;"><input type="number" min="1" max="31" name="datee" class="form-control" value="<?php if(isset($_POST['datee'])){echo $_POST['datee'];}?>">
				
						<br><span><?php if(isset($_SESSION['edatee'])){echo $_SESSION['edatee']; unset($_SESSION['edatee']);}?></span>
			</td>
		</tr>
        <tr>
			<th style="widht:50%;">Upload CSV file for Test Detail</th>
			<td style="widht:50%;"><input type="file" class="form-control" id="" name="csv" value="">
			</td>
		</tr>
		<tr>
			<th colspan="2" style="text-align:center"><input  type="submit" value="Submit" name="submit" class="btn-primary"></th>
		</tr>	
	</table>
</form>
</div>
<div class="clearfix"></div>
