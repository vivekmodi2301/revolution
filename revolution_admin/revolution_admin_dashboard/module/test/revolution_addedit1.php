<?php
$qry="";
$item=array();
@header('Content-type:text/html; charset=utf-8');
mysqli_query($con,"SET NAMES 'utf8'");
  if(isset($_POST['subject'])){
	  $success=1;
	  extract($_POST);

		if($_POST['datee']==''){
			//echo "hi";
			$success=0;
			$_SESSION['edatee']="Enter Date";
		}
// 		else if(!preg_match("/^[0-9.]*$/",$_POST['datee'])){
// 			$success=0;
// 			$_SESSION['edatee']="Enter proper Date.";
// 		}
		if($_POST['subject']==''){
			//echo "hi";
			$success=0;
			$_SESSION['esubject']="Enter Subject";
		}
		if($_POST['portion']==''){
			//echo "hi";
			$success=0;
			$_SESSION['eportion']="Enter portion";
		}
		else if(!preg_match("/^[a-z A-Z ]*$/",$_POST['portion'])){
			$success=0;
			$_SESSION['eportion']="Enter proper topic";
		}
		if($_POST['out_of']==''){
			//echo "hi";
			$success=0;
			$_SESSION['eout_of']="Enter Number";
		}else if(!preg_match("/^[0-9 ]*$/",$_POST['out_of'])){
			$success=0;
			$_SESSION['eout_of']="Enter proper Number";
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
					
						$sql="insert into test values('',$set,'$datee','$subject','$portion','$out_of','$class_id')";
						//echo $sql;exit;
						mysqli_query($con,$sql);
	
		  }
		  //echo $set;exit;
		  $_SESSION['udata']="Data uploaded successfully";
		  
				//echo "hi";exit;
				unset($_POST['submit']);	
	
		  header("location:index.php?mod=test&do=list&class=$_POST[class_id]");
	  }
	  }else{
		echo "hii";exit;  
	  }
   }
}

/*<?php if(isset($_POST['photo'])){?> title="<?php echo $_POST['photo']['name'];?>" <?php } ?>*/
?>
<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 col-lg-offset-4">
<form role="form" class="form-horizontal" enctype="multipart/form-data" method="post">
	<table class="table table-striped">
		<tr>
			<th colspan="2" style="text-align:center;">Test</th>
		</tr>
        <tr>
			<th style="widht:50%;">Date</th>
			<td style="widht:50%;"><input type="text" name="datee" class="form-control" value="<?php if(isset($_POST['datee'])){echo $_POST['datee'];}?>">
				
						<br><span><?php if(isset($_SESSION['edatee'])){echo $_SESSION['edatee']; unset($_SESSION['edatee']);}?></span>
			</td>
		</tr>
         
		<tr>
			<th style="widht:50%;">Test Topic</th>
			<td style="widht:50%;"><input type="text" name="portion" class="form-control" value="<?php if(isset($_POST['portion'])){echo $_POST['portion'];}?>">
				
						<br><span><?php if(isset($_SESSION['eportion'])){echo $_SESSION['eportion']; unset($_SESSION['eportion']);}?></span>
			</td>
		</tr>
        <tr>
			<th style="widht:50%;">Marks</th>
			<td style="widht:50%;"><input type="Number" name="out_of" class="form-control" value="<?php if(isset($_POST['out_of'])){echo $_POST['out_of'];}?>">
				
						<br><span><?php if(isset($_SESSION['eout_of'])){echo $_SESSION['eout_of']; unset($_SESSION['eout_of']);}?></span>
			</td>
		</tr>
        <tr>
			<th style="widht:50%;">Class</th>
             <?php 
		$q="select id, name from class";
		$ans=fetchall($q); ?>
		
			<td style="widht:50%;"><select name="class_id" class="form_control" required onchange="showsub(this.value)">
            
            <option >Select Class</option>
            <?php
            foreach($ans as $ans)
		{
		?>
            <option value="<?php echo $ans['id'] ?>" <?php if(isset($_POST['class'])){echo "selected";}?>><?php echo $ans['name'];?></option><?php } ?>
            
            
            </select>
			</td>
		</tr>
		<tr>
			<th style="widht:50%;">Subject</th>
             <td>
                 <select name="subject" id="sub">
                     <option value="">Select subject</option>
                 </select>
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
<!--<div id="sub1"></div>-->
<div class="clearfix"></div>
<script>
    function showsub(classid){
        // alert(classid);
        $.ajax({
            url:"module/test/subject.php",
            data:"classid="+classid,
            type:"post",
            success:function (e){
                $('#sub').html(e);
            }
        });
    }
</script>