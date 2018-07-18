<?php
	if (isset($_GET['id'])) {
		$id=$_GET['id'];
		$photo=fetch("select photo from message where id=$id");
		extract($photo);
		if(is_file("system/message/$photo")){
			unlink("system/message/$photo");
		}
		delete('message',$id);
		header("location:index.php?mod=message&do=list");
	}
?>
<table class="table table-striped">
	<tr>
		<th colspan="7" style="text-align:center">Messages</th>
	</tr>
	<tr>
		<th colspan="7" style="text-align:right;"><a href="index.php?mod=message&do=addedit">Add New</a></th>
	</tr>
	<tr>
		<th>S.No.</th>
		<th>Photo</th>
		<th>Name</th>
		<th>Designation</th>
		<th>Message</th>
		<th>Status</th>
		<th>Action</th>
	</tr>
	
	<?php
		$sno=1;
		$message_data=fetchAll("select id,name,photo,designation,message,status from message");
		foreach ($message_data as $message_data) {
			?>
				<tr>
					<td><?php echo $sno++;?></td>
					<td><img src="system/message/<?php echo $message_data['photo'];?>" height="30px" width="30px"></td>
					<td><?php echo $message_data['name'];?></td>
					<td><?php echo  $message_data['designation'];?></td>
					<td><?php echo  $message_data['message'];?></td>
					<td><?php echo $message_data['status'];?></td>
					<td><a href="index.php?mod=message&do=edit&id=<?php echo $message_data['id'];?>">Edit | <a href="#" onClick="del('<?php echo $message_data['id'];?>')">Delete</td>
				</tr>	
			<?php
		}
	?>
</table>
<script type="text/javascript">
	function del (id) {
		if (confirm("Do you really want to delete")) {
			location.href="index.php?mod=message&do=list&id="+id;
		};
	}
</script>