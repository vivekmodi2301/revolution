<?php
	if (isset($_POST['submit'])) {

			//echo "hi";exit;
		$success=1;
		//print_r($_FILES);
		

		if ($_FILES['photo']['name']) {

			//echo "hi";exit;
			if ($_FILES['photo']['type']=='image/jpeg' || $_FILES['photo']['type']=='image/png') {
				if(isset($_POST['photo'])){
					unlink("system/slider/$_POST[photo]");
				}
				$_POST['photo']=time()."_revolution_".$_FILES['photo']['name'];
			move_uploaded_file($_FILES['photo']['tmp_name'],'system/slider/'.$_POST['photo']);
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
			addupdate('slider',$_POST);
			header("location:index.php?mod=slider&do=addedit");
		}else{
			//print_r($_SESSION);exit;
		}


	}
?>
<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 col-lg-offset-4">
<form method="post" enctype="multipart/form-data">
	<table class="table table-striped">
		<tr>
			<th colspan="2" style="text-align:center;">Slider Form</th>
		</tr>
		<?php
			if (isset($_POST['photo'])) {
				?>
				<tr>
					<td colspan="2"><img src="system/slider/<?php echo $_POST['photo'];?>" height="100px" width="100px"><input type="hidden" name="photo" value="<?php echo $_POST['photo'];?>">
					</td>
				</tr>
				<?php
			}
		?>
		<tr>
			<th style="widht:50%;">Photo</td>
			<td style="widht:50%;"><input type="file" name="photo">
				<br><span><?php if(isset($_SESSION['efile'])){echo $_SESSION['efile']; unset($_SESSION['efile']);}?></span>
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
			<th colspan="2" style="text-align:center"><input name="submit" type="submit" value="Submit" class="btn-primary"></th>
		</tr>	
	</table>
</form>
</div>
<div class="clearfix"></div>