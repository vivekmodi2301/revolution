<?php
	$id="";
	if(isset($_GET['id'])){
		$id=$_GET['id'];
		$event_gallery_category_data=fetch("select id,name from event_gallery_category where id=$id");
	}
	if (isset($_POST['name'])) {

			//echo "hi";exit;
		$success=1;
		//print_r($_FILES);
		

		if (isset($_POST['name'])) {
			if ($_POST['name']=='') {
				$success=0;
				$_SESSION['ename']="Enter category Name";
			}else if(!preg_match("/^[a-z A-Z ]*$/",$_POST['name'])){
				$success=0;
				$_SESSION['ename']="Enter proper category Name";
			}else{
				$_POST['name']=strtolower($_POST['name']);
			}
		}

		if($success){
			//echo "hi";exit;
			//unset($_POST['submit']);	
			addupdate('event_gallery_category',$_POST,$id);
			header("location:index.php?mod=gallery_category&do=event_addedit");
		}


	}
?>
<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 col-lg-offset-4">
<form method="post" enctype="multipart/form-data">
	<table class="table table-striped">
		<tr>
			<th colspan="2" style="text-align:center;">Event Gallery Category Form</th>
		</tr>
		<tr>
			<th>Category Name</td>
			<td>
				<input type="text" class="form-control" value="<?php if($id){ if(isset($_POST['name'])){echo $_POST['name'];} else{echo $event_gallery_category_data['name'];}} else if(isset($_POST['name'])){ echo $_POST['name'];}?>" name="name"> 
				<br><span><?php if(isset($_SESSION['ename'])){echo $_SESSION['ename']; unset($_SESSION['ename']);}?></span>
			</td>
		</tr>
		<tr>
			<th colspan="2" style="text-align:center"><input  type="submit" value="Submit" class="btn-primary"></th>
		</tr>	
	</table>
</form>
</div>
<div class="clearfix"></div>