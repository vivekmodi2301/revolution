<?php
	$id="";
	if(isset($_GET['id'])){
		$id=$_GET['id'];
		$unique_message_data=fetch("select id,name,photo,designation,message,status from message where id=$id");
		//print_r($unique_faculty_data);
		//exit;
	}else{
		header("location:index.php");
	}
	if (isset($_POST['submit'])) {

		$success=1;
		

		if ($_FILES['photo']['name']) {

			//echo "hi";exit;
			
			if ($_FILES['photo']['type']=='image/jpeg' || $_FILES['photo']['type']=='image/png') {
				if(isset($_POST['photo']) ){
					unlink("system/message/$_POST[photo]");
				}
				if(isset($unique_message_data['photo'])){
					unlink("system/message/$unique_message_data[photo]");	
				}
				$_POST['photo']=time()."_revolution_".$_FILES['photo']['name'];
			move_uploaded_file($_FILES['photo']['tmp_name'],'system/message/'.$_POST['photo']);
			}else{
				$success=0;
				$_SESSION['efile']="Upload only jpeg or png file";
			}
		}
		else{

			//echo "hii";exit;
			if (!isset($_POST['photo'])) {
				//echo "hiii";exit;
				$success=0;
				$_SESSION['efile']="Upload a photo";
				//echo $_SESSION['efile'];exit;
			}
		}


		if($_POST['name']==''){
			//echo "hi";
			$success=0;
			$_SESSION['ename']="Enter name";
		}else if(!preg_match("/^[a-z A-Z ]*$/",$_POST['name'])){
			$success=0;
			$_SESSION['ename']="Enter proper name";
		}

		if($_POST['designation']==''){
			//echo "hi";
			$success=0;
			$_SESSION['edesignation']="Enter designation";
		}
		if($_POST['message']==''){
			//echo "hi";
			$success=0;
			$_SESSION['emessage']="Enter message";
		}
		
		if (isset($_POST['status'])) {
			if ($_POST['status']=='y' || $_POST['status']=='n') {

			//$success=1;
			//echo "hi";exit;
			}else{
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
			addupdate('message',$_POST,$id);
			header("location:index.php?mod=message&do=list");
		}


	}
?>
<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 col-lg-offset-4">
<form method="post" enctype="multipart/form-data">
	<table class="table table-striped">
		<tr>
			<th colspan="2" style="text-align:center;">Message</th>
		</tr>
		<?php
			if (isset($_POST['photo'])) {
				?>
				<tr>
					<td colspan="2"><img src="system/message/<?php echo $_POST['photo'];?>" height="100px" width="100px"><input type="hidden" name="photo" value="<?php echo $unique_message_data['photo'];?>">
					</td>
				</tr>
				<?php
			}
		?>
		<?php
			if (isset($unique_message_data['photo'])) {
				?>
				<tr>
					<td colspan="2"><img src="system/message/<?php echo $unique_message_data['photo']?>" height="100px" width="100px"><input type="hidden" name="photo" value="<?php echo $unique_message_data['photo'];?>">
					</td>
				</tr>
				<?php
			}
		?>
		<tr>
			<th style="widht:50%;">Photo</td>
			<td style="widht:50%;"><input type="file" name="photo">
				<br><span><?php if(isset($_SESSION['efile'])){echo $_SESSION['efile']; unset($_SESSION['efile']);} ?></span>
			</td>
		</tr>
		<tr>
			<th style="widht:50%;">Name</th>
			<td style="widht:50%;"><input type="text" name="name" class="form-control" value="<?php if(isset($_POST['name'])){echo $_POST['name'];}else{echo $unique_message_data['name'];}?>">
				
						<br><span><?php if(isset($_SESSION['ename'])){echo $_SESSION['ename']; unset($_SESSION['ename']);}?></span>
			</td>
		</tr>
		<tr>
			<th style="widht:50%;">Designation</th>
			<td style="widht:50%;"><input type="text" name="designation" class="form-control" value="<?php if(isset($_POST['designation'])){echo $_POST['designation'];}else{echo $unique_message_data['designation'];}?>">
				
						<br><span><?php if(isset($_SESSION['edesignation'])){echo $_SESSION['edesignation']; unset($_SESSION['edesignation']);}?></span>
			</td>
		</tr>
		<tr>
			<th style="widht:50%;">Message</th>
			<td style="widht:50%;"><textarea name="message" class="form-control">
				<?php if(isset($_POST['message'])){echo $_POST['message'];}else{echo $unique_message_data['message'];}?>
			</textarea>
				
						<br><span><?php if(isset($_SESSION['emessage'])){echo $_SESSION['emessage']; unset($_SESSION['emessage']);}?></span>
			</td>
		</tr>
		<tr>
			<th>Show</th>
			<td>
				<input type="radio" <?php if ($unique_message_data['status']=='y') {
					echo "checked";
				}
					
				?>
				name="status" value="y">Yes
				<input type="radio" <?php 
					if($id && $unique_message_data['status']=='n'){
						echo "checked";
					}
				?>
				name="status" value="n">No
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