<?php
		// if(isset($_GET['id'])){
		// 	$id=$_GET['id'];
		// 	//delme('icon',$id); 
		// 	header("location:index.php?mod=icon&do=list");
		// }
?>
<table class="table">
    <tr>
        <th colspan="7" style="text-align:center">Icon List</th>
    </tr>
	<tr>
		
		<td>LOGO</td>
		<td>SMALL LOGO</td>
		<td>MAP</td>
		<td>CONTACT</td>
		<td>EMAIL</td>
		<td>FACEBOOK</td>
		<td>TWITTER</td>
		
		<td>Action</td>
	</tr>
	<!-- <tr>
		<td colspan="3"><a href="index.php?mod=cat&do=change">Add new</a></td>
	</tr> -->
	<?php
		// $con=mysqli_connect(HOSTNAME,USERNAME,PASSWORD,DB);
		// $rs=mysqli_query($con,"select id,name from cat");
		// while($data=mysqli_fetch_assoc($rs)){
			$data=fetchAll("select logo,small_logo,map,contact,email,facebook,twitter from icon");
			foreach ($data as $data) {    //for print data
			?>
				<tr>
					<td><img src="<?php echo ROOT."system/logo_images/".$data['logo'];?>" height="100" width="100"></td>
					<td><img src="<?php echo ROOT."system/logo_images/".$data['small_logo'];?>" height="100" width="100"></td>
					<td><?php echo $data['map'];?></td>
					<td><?php echo $data['contact'];?></td>
					<td><?php echo $data['email'];?></td>
					<td><?php echo $data['facebook'];?></td>
					<td><?php echo $data['twitter'];?></td>
					


					<td><a href="index.php?mod=icon&do=addedit&id=<?php echo $data['email'];?>">Edit</a>
					<!-- <a href="#" onclick="del('<?php echo $data['id'];?>')">Delete</a> --></td>
				</tr>
			<?php	
		}
	?>
</table>
<!-- <script>
	function del(id){
		if(confirm("Do you really want to delete")){
			location.href="index.php?mod=cat&do=detail&id="+id;
		}
	}
</script> -->