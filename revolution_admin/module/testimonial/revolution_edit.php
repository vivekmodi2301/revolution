<?php
	$id="";
	if(isset($_GET['id'])){
		$id=$_GET['id'];
		$unique_testimonial_data=fetch("select message,status from testimonial where id=$id");
		//print_r($unique_slider_data);
	}else{
		header("location:index.php");
	}
	if (isset($_POST['submit'])) {

			//echo "hi";exit;
		$success=1;
		
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
			addupdate('testimonial',$_POST,$id);
			header("location:index.php?mod=testimonial&do=list");
		}else{
			//print_r($_SESSION);exit;
		}


	}
?>
<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 col-lg-offset-4">
<form method="post" enctype="multipart/form-data">
	<table class="table table-striped">
		<tr>
			<th colspan="2" style="text-align:center;">Testimonial Form</th>
		</tr>
		<tr>
			<th>Message</th>
			<td><?php echo $unique_testimonial_data['message'];?></td>
		</tr>
		<tr>
			<th>Show</th>
			<td>
				<input type="radio" <?php if ($unique_testimonial_data['status']=='y') {
					echo "checked";
				}
					
				?>
				name="status" value="y">Yes
				<input type="radio" <?php 
					if($id && $unique_testimonial_data['status']=='n'){
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