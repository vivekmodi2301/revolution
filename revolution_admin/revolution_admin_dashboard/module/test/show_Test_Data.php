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
		<th>S.No.</th>
		<th>Roll NO</th>
		<th>Subject</th>
        <th>Class</th>
		<th>Test Topic</th>
		<th>Marks Obtain</th>
        <th>Marks</th>
        <th>Date</th>
		<th>Action</th>
	</tr>
	
	<?php
		$sno=1;
		$qry="select test.id,roll,subject.name as sub,class.name as class,portion,scored,out_of,datee from test join subject on subject.id = test.subject join class on class.id = test.class_id where test.class_id=$_POST[id] and datee='$_POST[test_date]' ";
		$test_data=fetchAll($qry);
	//	echo $qry; exit;
		foreach ($test_data as $test_data) {
			?>
				<tr>
					<td><?php echo $sno++;?></td>
					<td><?php echo $test_data['roll'];?></td>
					<td><?php echo  $test_data['sub'];?></td>
                    <td><?php echo  $test_data['class'];?></td>
					<td><?php echo  $test_data['portion'];?></td>
					<td><?php echo  $test_data['scored'];?></td>
                    <td><?php echo  $test_data['out_of'];?></td>
                    <td><?php echo  $test_data['datee'];?></td>
					<td><a href="index.php?mod=test&do=edit&id=<?php echo $test_data['id'];?>&class= <?php echo $_POST['id']; ?>">Edit | <a href="#" onClick="del('<?php echo $test_data['id'];?>')">Delete</td>
				</tr>	
			<?php
		}
	?>
</table>