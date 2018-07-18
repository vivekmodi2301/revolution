<?php
	if (isset($_POST['submit']))
	{
		$success=1;
		if($_POST['category_id']=='')
		{
			$success=0;
			$_SESSION['ecategory_id']="Select category";
		}

		if ($_FILES['photo']['name']) 
		{
			$count=count($_FILES['photo']['name']);
			$allImageFile=1;
			for($i=0;$i<$count;$i++)
			{
				//print_r($_FILES['photo']['type'][$i]);
				if ($_FILES['photo']['type'][$i]!='image/jpeg' && $_FILES['photo']['type'][$i]!='image/png')
				{
					$allImageFile=0;
				}
			}
			if ($allImageFile) 
			{
				$photo=array();
				for($i=0;$i<$count;$i++)
				{
					$photo[$i]=time()."_revolution_".$_FILES['photo']['name'][$i];
					move_uploaded_file($_FILES['photo']['tmp_name'][$i],'system/event_gallery/'.$photo[$i]);
				}
				$_POST['photo']=implode(',',$photo);
			}
			else
			{
				$success=0;
				$_SESSION['efile']="Upload only jpeg or png file";
			}
		}
		else
		{
			if (!isset($_POST['photo'])) 
			{
				$success=0;
				$_SESSION['efile']="Upload a photo";
			}
		}

		if (isset($_POST['status'])) 
		{
			if ($_POST['status']=='y' || $_POST['status']=='n') 
			{
			}
			else
			{
				$success=0;
				$_SESSION['estatus']="Select status";	
			}
		}
		else
		{
			$success=0;
			$_SESSION['estatus']="Select status";
		}

		if($success)
		{
			unset($_POST['submit']);
			$photo=array();
			$photo=explode(',',$_POST['photo']);
			foreach ($photo as $p) 
			{
				$_POST['photo']=$p;
				addupdate('event_gallery',$_POST);
				header("location:index.php?mod=gallery_event&do=event_gallery_addedit");
			}
		}
	}
?>
<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 col-lg-offset-4">
<form method="post" enctype="multipart/form-data">
	<table class="table table-striped">
		<tr>
			<th colspan="2" style="text-align:center;">Event Gallery Form</th>
		</tr>
		<?php
			if (isset($_POST['photo'])) {
				$p=array();
				$p=explode(',',$_POST['photo']);
				?>
				<tr>
					<td colspan="2"><img src="system/event_gallery/<?php echo $p[0];?>" height="100px" width="100px"><input type="hidden" name="photo" value="<?php echo $_POST['photo'];?>">
					</td>
				</tr>
				<?php
			}
		?>
		<tr>
			<th>Category</th>
			<td>
				
			<select name="category_id">
				<option value="">Select Category</option>
				<?php
					$gallery_category=fetchAll("select id,name from event_gallery_category");
					foreach ($gallery_category as $gallery_category)
					{
				?>
						<option value="<?php echo $gallery_category['id'];?>" <?php if((isset($_POST['category_id'])) &&  ($_POST['category_id']==$gallery_category['id']))
							{?> selected <?php } ?>><?php echo $gallery_category['name'];?></option>
				<?php
					}
				?>
			</select>
			<br>
			<span>
				<?php 
					if(isset($_SESSION['ecategory_id']))
					{
						echo $_SESSION['ecategory_id'];
						unset($_SESSION['ecategory_id']);
					}
				?>
			</span>
		</td>
		</tr>
		<tr>
			<th style="widht:50%;">Photo</td>
			<td style="widht:50%;"><input type="file" multiple name="photo[]">
				<br><span><?php if(isset($_SESSION['efile'])){echo $_SESSION['efile']; unset($_SESSION['efile']);}?></span>
			</td>
		</tr>
		<tr>
			<th>Show</td>
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