<?php
		$id="";
		if(isset($_GET['id'])){
			$id=$_GET['id'];
			$data=fetch("select id,name,photo from starstudent where id=$id");

		}

		if(isset($_POST['name'])){
			$success=1;
			if(isset($_FILES['photo']['name'])){
				if($id && $data['photo'] && file_exists("system/stu_images/$data[photo]")){
					unlink("system/stu_images/$data[photo]");
				}
				if($_FILES['photo']['type']=='image/jpeg' ||$_FILES['photo']['type']=='image/png' ){
					$_POST['photo']=time()."_".$_FILES['photo']['name'];
					move_uploaded_file($_FILES['photo']['tmp_name'],'system/stu_images/'.$_POST['photo']);

				}
				else{
					$success=0;
					// echo "hi";exit;

					echo "Please upload only jpg or jpeg or png files";
				}

			}else{
				$success=0;
				echo "Please upload a photo";
			}
		if($success){
			addupdate('starstudent',$_POST,$id);
			header("location:index.php?mod=starstu&do=list");
		}
	}
?>
 



 <form method="post" enctype="multipart/form-data">
 		<table class="table">
 		    <tr>
 		        <th colspan="2" style="text-align:center">Star Student From</th>
 		    </tr>  
 			<tr>
 				<td>NAME</td>
 				<td> <input type="text" value="<?php if($id){echo $data['name'];}?>" name="name"></td>

 			</tr>
 			<?php if($id){?>
	 			<tr>
	 				<td colspan="2"><img src="<?php echo ROOT."system/stu_images/".$data['photo'];?>" height="100" width="100"></td>
	 			</tr>
	 		<?php }?>
 			<tr>
 				<td>PHOTO</td>
 				<td><input type="file" name="photo"></td>
 				
 			</tr>
 			<tr>
 				
 				<td colspan="2" style="text-align:center"><input type="submit" class="btn btn-primary" value="SUBMIT"></td>
 				
 			</tr>
 			
 		</table>
 </form>