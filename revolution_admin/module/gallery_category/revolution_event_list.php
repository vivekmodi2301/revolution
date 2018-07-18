<?php
	if (isset($_GET['id'])) {
		$id=$_GET['id'];
		delete('event_gallery_category',$id);
		header("location:index.php?mod=gallery_category&do=event_list");
	}
?>
<table class="table table-striped">
	<tr>
		<th colspan="3" style="text-align:center">Event Gallery Category List</th>
	</tr>
	<tr>
		<th>S.No.</th>
		<th>Name</th>
		<th>Action</th>
	</tr>
	<tr>
		<th colspan="3" style="text-align:right;"><a href="index.php?mod=gallery_category&do=event_addedit">Add New</a></th>
	</tr>
	<?php
		$sno=1;
		$event_gallery_category_data=fetchAll("select id,name from event_gallery_category");
		foreach ($event_gallery_category_data as $event_gallery_category_data) {
			?>
				<tr>
					<td><?php echo $sno++;?></td>
					<td><?php echo ucwords($event_gallery_category_data['name']);?></td>
					<td><a href="index.php?mod=gallery_category&do=event_addedit&id=<?php echo $event_gallery_category_data['id'];?>">Edit | <a href="#" onClick="del('<?php echo $event_gallery_category_data['id'];?>')">Delete</td>
				</tr>	
			<?php
		}
	?>
</table>
<script type="text/javascript">
	function del (id) {
		if (confirm("Do you really want to delete")) {
			location.href="index.php?mod=gallery_category&do=event_list&id="+id;
		};
	}
</script>