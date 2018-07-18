<?php
	if (isset($_GET['id'])) {
		$id=$_GET['id'];
		delete('test',$id);
		header("location:index.php?mod=test&do=list&class=$_GET[class]");
	}
?>
<table class="table table-striped">
	<tr>
		<th colspan="9" style="text-align:center">Test List</th>
	</tr>
	<tr>
		<th>S.No.</th>
		<th>Subject</th>
    <th>Class</th>
		<th>Test Topic</th>
		<th>Marks Obtain</th>
    <th>Marks</th>
    <th>Date</th>
	</tr>

	<?php
		$sno=1;
		$qry="select test.id,roll,subject.name as sub,class.name as class,portion,scored,out_of,datee from test join subject on subject.id = test.subject join class on class.id = test.class_id where roll=$roll  ";
		$test_data=fetchAll($qry);
	//	echo $qry; exit;
		foreach ($test_data as $test_data) {
			?>
				<tr>
					<td><?php echo $sno++;?></td>
					<td><?php echo  $test_data['sub'];?></td>
                    <td><?php echo  $test_data['class'];?></td>
					<td><?php echo  $test_data['portion'];?></td>
					<td><?php echo  $test_data['scored'];?></td>
                    <td><?php echo  $test_data['out_of'];?></td>
                    <td><?php echo  $test_data['datee'];?></td>

			<?php
		}
	?>
</table>
