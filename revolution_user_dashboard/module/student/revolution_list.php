<?php
	if (isset($_GET['id'])) {
		$id=$_GET['id'];
		$photo=fetch("select photo from student where id=$id");
		extract($photo);
		if(is_file("system/student/$photo")){
			unlink("system/student/$photo");
		}
		delete('student',$id);
		header("location:index.php?mod=student&do=list");
	}
?>
<table class="table table-striped">
	<tr>
		<th colspan="16" style="text-align:center">Student List</th>
	</tr>
	<tr>
		<th style="width:80px;">S.No.</th>
		<th style="width:200px;">Name</th>
        <th>Gender</th>
        <th>class</th>
        <th>Father name</th>
        <th>Email</th>
        <th>Whatsapp no.</th>
        <th>Photo</th>
  		
		<th>Action</th>
	</tr>
	<tr>
		<th colspan="16" style="text-align:right;"><a href="index.php?mod=student&do=addedit">Add New</a></th>
	</tr>
	<?php
		$sno=1;
		$qry="select student.id,student.name,class.name as sub,gender, father_name , email, dob , address , whatsapp_no , mobile , previous_school , board , previous_per , photo , pass , datee from student join class on student.class_id=class.id";
		$student_data=fetchAll($qry);
		//echo $qry;
		//print_r($student_data);
		foreach ($student_data as $student_data) {
			?>
				<tr>
					<td><?php echo $sno++;?></td>
					<td><?php echo $student_data['name'];?></td>
                    <td><?php echo $student_data['gender'];?></td>
                    <td><?php echo $student_data['sub'];?></td>
                    <td><?php echo $student_data['father_name'];?></td>
                    <td><?php echo $student_data['email'];?></td>
                    <td><?php echo $student_data['whatsapp_no'];?></td>
                    <td><img src="system/student/<?php echo $student_data['photo'];?>" height="30px" width="30px"></td>
					<td><a href="index.php?mod=student&do=edit&id=<?php echo $student_data['id'];?>">Edit | <a href="#" onClick="del('<?php echo $student_data['id'];?>')">Delete</td>
				</tr>	
			<?php
		}
	?>
</table>
<script type="text/javascript">
	function del (id) {
		if (confirm("Do you really want to delete")) {
			location.href="index.php?mod=student&do=list&id="+id;
		};
	}
</script>