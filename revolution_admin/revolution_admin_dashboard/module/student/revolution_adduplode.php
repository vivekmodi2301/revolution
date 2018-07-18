<?php
$qry="";
$item=array();
@header('Content-type:text/html; charset=utf-8');
mysqli_query($con,"SET NAMES 'utf8'");
if(isset($_POST['submit']))
{
	$success=1;
	extract($_POST);
	if($_POST['class_id']=='')
	{
		$success=0;
		$_SESSION['eclass_id']="Select category";
	}
	if($success)
	{
		if($_FILES['csv']['name'])
		{
			if($_FILES['csv']['type']=='application/vnd.ms-excel')
			{
			  //echo "hi";exit;
				$handle=fopen($_FILES['csv']['tmp_name'],"r");
				while ($data=fgetcsv($handle))
				{
					//echo "<pre>";
			  		//print_r($data);exit;
			  		// $item=array();
			  		$j=0;
			  		$ccount=count($data);
			  		for($c=0;$c<$ccount;$c++)
			  		{
						$item[$j]=mysqli_real_escape_string($con,$data[$c]);
						$j++;
					}
					//$item[0]=md5($item[0]);
					//print_r($item);
					//echo $item[0];
					$set="";
					$count=count($item);
					for($j=0;$j<$count-1;$j++)
					{
						//echo "hi";
						//echo $item[0];
						$set.="'$item[$j]',";
					}
					$count=$count-1;
					$pass=md5($item[$count]);
					$set.="'$pass'";
					$sql="insert into student values('',$set,$_POST[class_id],'','')";
					//echo $sql;//exit;
					//echo "<br>";
					//echo USERNAME;
					//echo PASSWORD;
					//echo DB;exit;
					mysqli_query($con,$sql);
				}
		  		$_SESSION['udata']="Data uploaded successfully";
				unset($_POST['submit']);
				//exit;
				header("location:index.php?mod=student&do=list");
	  		}
	  	}
	  	else
	  	{
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
			<th colspan="2" style="text-align:center;">Uplode Student List</th>
		</tr>
		<tr>
			<th style="widht:50%;">Class</th>
             <?php 
				$q="select id, name from class";
				$ans=fetchall($q); ?>
		
			<td style="widht:50%;">
				<select name="class_id" class="form_control" required >
            		<option >Select Class</option>
            			<?php
            				foreach($ans as $ans)
							{
						?>
           						 <option value="<?php echo $ans['id'] ?>" <?php if(isset($_POST['class_id'])){echo "selected";}?>><?php echo $ans['name'];?></option>
           				<?php 
           					} 
           				?>
            	</select>
            	<br>
			<span>
				<?php 
					if(isset($_SESSION['eclass_id']))
					{
						echo $_SESSION['eclass_id'];
						unset($_SESSION['eclass_id']);
					}
				?>
			</span>
			</td>
		</tr>
        <tr>
			<th style="widht:50%;">Upload CSV file</th>
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
