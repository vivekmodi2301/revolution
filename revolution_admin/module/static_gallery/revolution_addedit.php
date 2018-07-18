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
			move_uploaded_file($_FILES['photo']['tmp_name'],'system/static_gallery/'.$_POST['photo']);
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




		if($success){
			//echo "hi";exit;
			unset($_POST['submit']);	
			addupdate('static_gallery',$_POST);
			header("location:index.php?mod=static_gallery&do=addedit");
		}else{
			//print_r($_SESSION);exit;
		}


	}
?>
<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 col-lg-offset-4">
<form method="post" enctype="multipart/form-data">
	<table class="table table-striped">
		<tr>
			<th colspan="2" style="text-align:center;">Static Page Photo Form</th>
		</tr>
		<?php
			if (isset($_POST['photo'])) {
				?>
				<tr>
					<td colspan="2"><img src="system/static_gallery/<?php echo $_POST['photo'];?>" height="100px" width="100px"><input type="hidden" name="photo" value="<?php echo $_POST['photo'];?>">
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
			<th colspan="2" style="text-align:center"><input name="submit" type="submit" value="Submit" class="btn-primary"></th>
		</tr>	
	</table>
</form>
</div>
<div class="clearfix"></div>