<?php
	           //edit
	$id=1;
		$data=fetch("select * from icon where id=1");
	

     if(isset($_POST['email'])){
			if(isset($_FILES['logo']['name'])){
				// echo "hi";exit;
				if($_FILES['logo']['type']=='image/jpeg' ||$_FILES['logo']['type']=='image/png' ){
					if(file_exists("system/logo_images/$data[logo]")){
						unlink("system/logo_images/$data[logo]");
					}
					$_POST['logo']=time()."_".$_FILES['logo']['name'];
					move_uploaded_file($_FILES['logo']['tmp_name'],'system/logo_images/'.$_POST['logo']);

				}
				else{
					// echo "hi";exit;

					echo "Please upload only jpg or jpeg or png files";
				}

			}



			if(isset($_FILES['small_logo']['name'])){
				if($_FILES['small_logo']['type']=='image/jpeg' ||$_FILES['small_logo']['type']=='image/png' ){

					if(file_exists("system/logo_images/$data[small_logo]")){
						unlink("system/logo_images/$data[small_logo]");
					}
					$_POST['small_logo']=time()."_".$_FILES['small_logo']['name'];
					move_uploaded_file($_FILES['small_logo']['tmp_name'],'system/logo_images/'.$_POST['small_logo']);

				}
				else{
					// echo "hi";exit;

					echo "Please upload only jpg or jpeg or png files";
				}

			}



	           //addupdate
		addupdate('icon',$_POST,1);
		header("location:index.php?mod=icon&do=list");
	}
?>

<form method="post" enctype="multipart/form-data">
<table class="table ">
    <tr>
        <th colspan="2" style="text-align:center">Icon Form</th>
    </tr>
	<tr>
		<td colspan="2"><img src="<?php echo ROOT."system/logo_images/".$data['logo'];?>" height="100" width="100"></td>
		
	</tr>
	<tr>
		<td>LOGO</td>
		<td>
		<input value="<?php if($id){echo $data['logo'];}?>" type="file" name="logo">	
		</td>
	</tr>
	<tr>
		
		<td colspan="2"><img src="<?php echo ROOT."system/logo_images/".$data['small_logo'];?>" height="100" width="100"></td>
	</tr>
	<tr>
		<td>SMALL LOGO</td>
		<td><input value="<?php if($id){echo $data['small_logo'];}?>" type="file" name="small_logo"> </td>       
	</tr>
	<tr>
		<td>MAP</td>
		<td>
		<input value="<?php if($id){echo $data['map'];}?>" type="text" name="map">	
		</td>
	</tr>
	<tr>
		<td>CONTACT</td>
		<td>
		<input value="<?php if($id){echo $data['contact'];}?>" type="text" name="contact">	
		</td>
	</tr>
	<tr>
		<td>EMAIL</td>
		<td>
		<input value="<?php if($id){echo $data['email'];}?>" type="text" name="email">	
		</td>
	</tr>
	<tr>
		<td>FACEBOOK</td>
		<td>
		<input value="<?php if($id){echo $data['facebook'];}?>" type="text" name="facebook">	
		</td>
	</tr>

	<tr>
		<td>TWITTER</td>
		<td>
		<input value="<?php if($id){echo $data['twitter'];}?>" type="text" name="twitter">	
		</td>
	</tr>



	<tr>
		<td style="text-align:center" colspan="2"><input type="submit" class="btn btn-primary" value="Submit"></td>
	</tr>
</table>
</form>

