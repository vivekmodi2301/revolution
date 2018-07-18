<?php
	$id="";
	if(isset($_GET['id'])){
		$id=$_GET['id'];
		$unique_class_data=fetch("select id,name,status from class where id=$id");
		//print_r($unique_test_data);
		//exit;
	}else{
		header("location:index.php");
	}
	if (isset($_POST['name'])) {

	$success=1;

		if($_POST['name']==''){
			//echo "hi";
			$success=0;
			$_SESSION['ename']="Enter name";
		}else if(!preg_match("/^[a-z A-Z 0-9]*$/",$_POST['name'])){
			$success=0;
			$_SESSION['ename']="Enter proper name";
		}



		if (isset($_POST['status'])) {
			if ($_POST['status']=='Yes' || $_POST['status']=='No')
			{

			}
			else{
				$success=0;
				$_SESSION['estatus']="Select status";
			}
		}
		else{
			$success=0;
			$_SESSION['estatus']="Select status";
		}

		if($success){
			//echo "hi";exit;
		unset($_POST['submit']);
		//$classTable= array('name'=>$_POST['name'],'status'=>$_POST['status']);
			addupdate('class',$_POST,$id);
			header("location:index.php?mod=class_subject&do=list");
		}
	}
?>
	<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 col-lg-offset-4">
<form method="post" enctype="multipart/form-data">
	<table class="table table-striped">
		<tr>
			<th colspan="2" style="text-align:center;">Class</th>
		</tr>
		<tr>
			<th style="widht:50%;">Name</th>
			<td style="widht:50%;"><input type="text" name="name" class="form-control" value="<?php if(isset($_POST['name'])){echo $_POST['name'];}else{echo $unique_class_data['name'];}?>">

						<br><span><?php if(isset($_SESSION['ename'])){echo $_SESSION['ename']; unset($_SESSION['ename']);}?></span>
			</td>
		</tr>
        <tr>
			<th>Show</th>
			<td>
				<input type="radio" <?php if (isset($_POST['status']) && $_POST['status']=='Yes') {
					echo "checked";
				}else if($unique_class_data['status']=='Yes'){echo "checked";}?> name="status" value="Yes">Yes
				<input type="radio" <?php if (isset($_POST['status']) && $_POST['status']=='No') {
					echo "checked";
				}else if($unique_class_data['status']=='No'){echo "checked";}?> name="status" value="No">No
				<br><span><?php if(isset($_SESSION['estatus'])){echo $_SESSION['estatus']; unset($_SESSION['estatus']);}?></span>
			</td>
		</tr>
		<tr>
			<th colspan="2" style="text-align:center"><input name="submit" type="submit" value="Submit" class="btn-primary"></th>
		</tr>
	</table>
</form>
</div>
<div class="clearfix"></div>
