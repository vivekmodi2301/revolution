<?php
	if (isset($_GET['id'])) {
		$id=$_GET['id'];
		$photo=fetch("select photo from testimonial where id=$id");
		extract($photo);
		if(is_file("system/testimonial/$photo")){
			unlink("system/testimonial/$photo");
		}
		delete('testimonial',$id);
		header("location:index.php?mod=testimonial&do=list");
	}
?>
<table class="table table-striped">
	<tr>
		<th colspan="6" style="text-align:center">Testimonial  List</th>
	</tr>
	<tr>
		<th>S.No.</th>
		<th>Name</th>
		<th>Message</th>
		<th>Status</th>
		<th>Action</th>
	</tr>
	<?php
		$sno=1;
		$testimonial_data=fetchAll("select testimonial.id,name,message,photo,status from testimonial join student on student.roll=testimonial.roll");
		foreach ($testimonial_data as $testimonial_data) {
			?>
				<tr>
					<td><?php echo $sno++;?></td>
					<td><?php echo $testimonial_data['name'];?></td>
					<td><?php echo  $testimonial_data['message'];?></td>
					<td><?php echo $testimonial_data['status'];?></td>
					<td><a href="index.php?mod=testimonial&do=edit&id=<?php echo $testimonial_data['id'];?>">Edit | <a href="#" onClick="del('<?php echo $testimonial_data['id'];?>')">Delete</td>
				</tr>	
			<?php
		}
	?>
</table>
<script type="text/javascript">
	function del (id) {
		if (confirm("Do you really want to delete")) {
			location.href="index.php?mod=testimonial&do=list&id="+id;
		};
	}
</script>