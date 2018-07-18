<?php

	if (isset($_POST['message'])) {

			//echo "hi";exit;
		$success=1;
		//print_r($_FILES);
		

	
	
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
			addupdate('testimonial',$_POST);
			header("location:index.php?mod=testimonial&do=addedit");
		}


	}
?>
<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 col-lg-offset-4">
<form method="post" enctype="multipart/form-data">
	<table class="table table-striped">
		<tr>
			<th colspan="2" style="text-align:center;">Slider Form</th>
		</tr>
	
		<tr>
			<th>Message</td>
			<td><textarea class="form-control" name="message"><?php if(isset($_POST['message'])){echo $_POST['message'];}?></textarea>
				<br><span><?php if(isset($_SESSION['emsg'])){echo $_SESSION['emsg']; unset($_SESSION['emsg']);}?></span>
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