<?php
	if (isset($_GET['id'])) {
		$id=$_GET['id'];
		delete('class',$id);
		header("location:index.php?mod=class_subject&do=list");
	}
?>
<table class="table table-striped">
	<tr>
		<th colspan="5" style="text-align:center">Subject list</th>
	</tr>
	<tr>
		<th>S.No.</th>
		<th>Name</th>
		<th>Status</th>
		<th>Action</th>
	</tr>
	<tr>
		<th colspan="6" style="text-align:right;"><a href="index.php?mod=class_subject&do=addedit">Add New</a></th>
	</tr>
	<?php
		$sno=1;
		$sub=fetchAll("select id,name,status from class");
		foreach ($sub as $sub) {
			?>
				<tr>
					<td><?php echo $sno++;?></td>
					<td><?php echo $sub['name'];?></td>
					<td><?php echo $sub['status'];?></td>
					<td><a href="index.php?mod=class_subject&do=edit&id=<?php echo $sub['id'];?>">Edit | <a href="#" onClick="del('<?php echo $sub['id'];?>')">Delete</td>
				</tr>	
			<?php
		}
	?>
</table>
<script type="text/javascript">
	function del (id) {
		if (confirm("Do you really want to delete")) {
			location.href="index.php?mod=class_subject&do=list&id="+id;
		};
	}
</script>