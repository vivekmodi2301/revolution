<?php
/*<?php if(isset($_POST['photo'])){?> title="<?php echo $_POST['photo']['name'];?>" <?php } ?>*/
	if (isset($_POST['name'])) {

		$success=1;
		
		if ($_FILES['photo']['name']) {

			//echo "hi";exit;
			if ($_FILES['photo']['type']=='image/jpeg' || $_FILES['photo']['type']=='image/png') {
				if(isset($_POST['photo'])){
					unlink("system/Faculty/$_POST[photo]");
				}
				$_POST['photo']=time()."_revolution_".$_FILES['photo']['name'];
			move_uploaded_file($_FILES['photo']['tmp_name'],'system/Faculty/'.$_POST['photo']);
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

		if($_POST['subject']==''){
			//echo "hi";
			$success=0;
			$_SESSION['esubject']="Enter subject";
		}
		if($_POST['experince']==''){
			//echo "hi";
			$success=0;
			$_SESSION['eexperince']="Enter experince";
		}
		else if(!preg_match("/^[0-9 ]*$/",$_POST['experince'])){
			$success=0;
			$_SESSION['eexperince']="Enter proper experince";
		}

		if (isset($_POST['status'])) {
			if ($_POST['status']=='y' || $_POST['status']=='n') 
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
			addupdate('faculty',$_POST);
			header("location:index.php?mod=faculty&do=addedit");
		}


	}
?>
<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 col-lg-offset-4">
<form method="post" enctype="multipart/form-data">
	<table class="table table-striped">
		<tr>
			<th colspan="2" style="text-align:center;">Faculty Form</th>
		</tr>
		<?php
			if (isset($_POST['photo'])) {
				
				?>
				<tr>
					<td colspan="2"><img src="system/faculty/<?php echo $_POST['photo'];?>" height="100px" width="100px"><input type="hidden" name="photo" value="<?php echo $_POST['photo'];?>">
					</td>
				</tr>
				<?php
			}
		?>
		<tr>
			<th>Photo</td>
			<td><input type="file" name="photo" >
				<br><span><?php if(isset($_SESSION['efile'])){echo $_SESSION['efile']; unset($_SESSION['efile']);}?></span>
			</td>
		</tr>
		<tr>
			<th style="widht:50%;">Name</th>
			<td style="widht:50%;"><input type="text" name="name" class="form-control" value="<?php if(isset($_POST['name'])){echo $_POST['name'];}?>">
				
						<br><span><?php if(isset($_SESSION['ename'])){echo $_SESSION['ename']; unset($_SESSION['ename']);}?></span>
			</td>
		</tr>
		<tr>
			<th style="widht:50%;">Subject</th>
			<td style="widht:50%;"><input type="text" name="subject" class="form-control" value="<?php if(isset($_POST['subject'])){echo $_POST['subject'];}?>">
				
						<br><span><?php if(isset($_SESSION['esubject'])){echo $_SESSION['esubject']; unset($_SESSION['esubject']);}?></span>
			</td>
		</tr>
		<tr>
			<th style="widht:50%;">Experince</th>
			<td style="widht:50%;"><input type="text" name="experince" class="form-control" value="<?php if(isset($_POST['experince'])){echo $_POST['experince'];}?>">
				
						<br><span><?php if(isset($_SESSION['eexperince'])){echo $_SESSION['eexperince']; unset($_SESSION['eexperince']);}?></span>
			</td>
		</tr>
		<tr>
			<th>Show</th>
			<td>
				<input type="radio" <?php if (isset($_POST['status']) && $_POST['status']=='y') {
					echo "checked";
				}?> name="status" value="y">Yes
				<input type="radio" <?php if (isset($_POST['status']) && $_POST['status']=='n') {
					echo "checked";
				}?> name="status" value="n">No
				<br><span><?php if(isset($_SESSION['estatus'])){echo $_SESSION['estatus']; unset($_SESSION['estatus']);}?></span>
			</td>
		</tr>
		<tr>
			<th colspan="2" style="text-align:center"><input  type="submit" value="Submit" class="btn-primary"></th>
		</tr>	
	</table>
</form>
</div>
<div class="clearfix"></div>

