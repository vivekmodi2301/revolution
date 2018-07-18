<?php
session_start();
ob_start(); 
$in=glob('../../include/php/*.php');
foreach($in as $file)
{
	//echo $file;
	include_once($file);
}
?>
<table class="table table-striped">
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
	
	<?php
		$sno=1;
		$name=$_POST['search_name'];
		$classs=$_POST['search_class'];
		$whatsapp=$_POST['search_whatsapp'];
		$wh="";
		if($name!="")
			$wh="where student.name like '$name%'";
		if($classs!="")
			if($wh=="")
				$wh="where class.name like '$classs%'";
			else
				$wh.=" and class.name like '$classs%'";
		if($whatsapp!="")
			if($wh=="")
				$wh="where whatsapp_no like '$whatsapp%'";
			else
				$wh.=" and whatsapp_no like '$whatsapp%'";
		$qry="select student.id,student.name,class.name as sub,gender, father_name , email, dob , address , whatsapp_no , mobile , previous_school , board , previous_per , photo , pass , datee from student join class on student.class_id=class.id $wh";

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
					<td><a href="index.php?mod=student&do=edit&id=<?php echo $student_data['id'];?>">Edit |
					    <a href="index.php?mod=student&do=cpass&id=<?php echo $student_data['id'];?>">Change Password</a> | <a href="#" onClick="del('<?php echo $student_data['id'];?>')">Delete</td>
				</tr>	
			<?php
		}
	?>
</table>
