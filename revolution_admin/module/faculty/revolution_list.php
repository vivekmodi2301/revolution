<?php
	if (isset($_GET['id'])) {
		$id=$_GET['id'];
		$photo=fetch("select photo from faculty where id=$id");
		extract($photo);
		if(is_file("system/faculty/$photo")){
			unlink("system/faculty/$photo");
		}
		delete('faculty',$id);
		header("location:index.php?mod=faculty&do=list");
	}
?>
<table class="table table-striped">
	<tr>
		<th colspan="7" style="text-align:center">Faculty List</th>
	</tr>
	<tr>
		<th colspan="7" style="text-align:right;"><a href="index.php?mod=faculty&do=addedit">Add New</a></th>
	</tr>
	<tr>
		<th>S.No.</th>
		<th>Photo</th>
		<th>Name</th>
		<th>Subject</th>
		<th>Experince</th>
		<th>Status</th>
		<th>Action</th>
	</tr>
	
	<?php
		$sno=1;
		$faculty_data=fetchAll("select id,name,photo,subject,experince,status from faculty");
		foreach ($faculty_data as $faculty_data) {
			?>
				<tr>
					<td><?php echo $sno++;?></td>
					<td><img src="system/faculty/<?php echo $faculty_data['photo'];?>" height="30px" width="30px"></td>
					<td><?php echo $faculty_data['name'];?></td>
					<td><?php echo  $faculty_data['subject'];?></td>
					<td><?php echo  $faculty_data['experince'];?></td>
					<td><?php echo $faculty_data['status'];?></td>
					<td><a href="index.php?mod=faculty&do=edit&id=<?php echo $faculty_data['id'];?>">Edit | <a href="#" onClick="del('<?php echo $faculty_data['id'];?>')">Delete</td>
				</tr>	
			<?php
		}
	?>
</table>
<script type="text/javascript">
	function del (id) {
		if (confirm("Do you really want to delete")) {
			location.href="index.php?mod=faculty&do=list&id="+id;
		};
	}
</script>