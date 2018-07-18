<?php
	$did="";
	if(isset($_GET['did'])){
		// exit;
		$did=$_GET['did'];
		$data=$dbobj->fetchone("select id,name,photo from starstudent where id=$did ");
		if(file_exists("include/stu_images/$data[photo]"))
			unlink("include/stu_images/$data[photo]");
		$dbobj->deletedata('starstudent',$did);
		//header("location:index.php?mod=starstu&do=list");
	}
?>

	<table class="table">
	    <tr>
	        <th colspan="4" style="text-align:center">Star Student List</th>
	    </tr>  
	    <tr>
	        <th colspan="4" style="text-align:right"><a href="index.php?mod=starstu&do=addedit">Add New</a></th>
	    </tr>  
		<tr>
			<td>SNO</td>
			<td>NAME</td>
			<td>PHOTO</td>
			<td>Action</td>

		</tr>
		
		 	<?php
		 	$sno=1;
     		$tdata=fetchAll("select id,name,photo from starstudent");
     		   // print_r($tdata);exit;
		 	foreach($tdata as $data){

		 	?>	
		<tr>
			<td><?php echo $sno++;?></td>
			<td><?php echo $data['name'];?></td>
			<td><img src="<?php echo ROOT."system/stu_images/".$data['photo'];?>" height="100" width="100"></td>
			

			<td><a href="index.php?mod=starstu&do=addedit&id=<?php echo $data['id'];?>">EDIT</a>
			<a href="#" onclick="delme('<?php echo $data['id'];?>')">Delete</a>
			</td>

		</tr>
		<?PHP } ?>
	</table>
	<script type="text/javascript">
		function delme(did){
			if(confirm("DELETE")){
				location.href="index.php?mod=starstu&do=list&did="+did;
			}
		}
	</script>