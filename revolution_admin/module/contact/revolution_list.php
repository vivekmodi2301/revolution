<?php 
	if(isset($_GET['id'])){
		$id=$_GET['id'];
		delete('contact',$id);
		header("location:index.php?mod=contact&do=");
	}
?>
<table class="table table-striped">
	<tr>
		<th colspan="8" style="text-align:center">Contact List</th>
	</tr>
	<tr>
		<th>S.No.</th>
		<th>Name</th>
		<th>Email</th>
		<th>Mobile No.</th>
		<th>Subject</th>
		<th>Message</th>
		<th>Status</th>
		<th>Action</th>
	</tr>
	
	<?php
		$sno=1;
		$contact_data=fetchAll("select id,name,email,mobile,subject,message,status from contact");
		foreach ($contact_data as $contact_data) {
			?>
				<tr>
					<td><?php echo $sno++;?></td>
					<td><?php echo $contact_data['name'];?></td>
					<td><?php echo  $contact_data['email'];?></td>
					<td><?php echo  $contact_data['mobile'];?></td>
					<td><?php echo  $contact_data['subject'];?></td>
					<td><?php echo  $contact_data['message'];?></td>
					<td><?php echo $contact_data['status'];?></td>
					<td><a href="#" onclick="del('<?php echo $contact_data['id'];?>')">Delete</a></td>					
				</tr>	
			<?php
		}
	?>
</table>
<script type="text/javascript">
	function del(did){
		if(confirm("Do you want to delete")){
			location.href="index.php?mod=contact&do=&id="+did;
		}
	}
</script>