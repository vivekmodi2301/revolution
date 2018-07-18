<?php
	if (isset($_GET['id'])) {
		$id=$_GET['id'];
		$photo=fetch("select photo from slider where id=$id");
		extract($photo);
		if(is_file("system/slider/$photo")){
			unlink("system/slider/$photo");
		}
		delete('slider',$id);
		header("location:index.php");
	}
?>
<table class="table table-striped">
	<tr>
		<th colspan="4" style="text-align:center">Slider Photo List</th>
	</tr>
	<tr>
		<th>S.No.</th>
		<th>Photo</th>
		<th>Status</th>
		<th>Action</th>
	</tr>
	<tr>
		<th colspan="4" style="text-align:right;"><a href="index.php?mod=slider&do=addedit">Add New</a></th>
	</tr>
	<?php
		$sno=1;
		$slider_data=fetchAll("select id,photo,status from slider");
		foreach ($slider_data as $slider_data) {
			?>
				<tr>
					<td><?php echo $sno++;?></td>
					<td><img src="system/slider/<?php echo $slider_data['photo'];?>" height="30px" width="30px"></td>
					<td><?php echo $slider_data['status'];?></td>
					<td><a href="index.php?mod=slider&do=edit&id=<?php echo $slider_data['id'];?>">Edit | <a href="#" onClick="del('<?php echo $slider_data['id'];?>')">Delete</td>
				</tr>	
			<?php
		}
	?>
</table>
<script type="text/javascript">
	function del (id) {
		if (confirm("Do you really want to delete")) {
			location.href="index.php?id="+id;
		};
	}
</script>