<?php
	if (isset($_GET['id'])) {
		$id=$_GET['id'];
		delete('test',$id);
		header("location:index.php?mod=test&do=list&class=$_GET[class]");
	}
?>
<table class="table">
	<tr>
		<th colspan="9" style="text-align:center">Test List</th>
	</tr>
	<tr>
		<th colspan="5" style="text-align:left;">
			<select name="test_date" onChange="show_data(this.value,<?php echo $_GET['class']; ?>)">
				<option value="">Select date</option>
				<?php
					$datee=fetchAll("select datee from test join subject on subject.id = test.subject join class on class.id = test.class_id where test.class_id=$_GET[class] group by datee");
					foreach ($datee as $datee)
					{
				?>
						<option value="<?php echo $datee['datee'];?>" <?php if((isset($_POST['test_date'])) &&  ($_POST['test_date']==$datee['datee']))
						{?> selected <?php } ?>><?php echo $datee['datee'];?>
						</option>
				<?php
					}
				?>
			</select>
		</th>
		<th colspan="4" style="text-align:right;"><a href="index.php?mod=test&do=addedit">Add New</a></th>
	</tr>
</table>
<div id="test_data">
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
		$qry="select test.id,roll,subject.name as sub,class.name as class,portion,scored,out_of,datee from test join subject on subject.id = test.subject join class on class.id = test.class_id where test.class_id=$_GET[class]  ";
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
					<td><a href="index.php?mod=test&do=edit&id=<?php echo $test_data['id'];?>&class= <?php echo $_GET['class']; ?>">Edit | <a href="#" onClick="del('<?php echo $test_data['id'];?>')">Delete</td>
				</tr>	
			<?php
		}
	?>
</table>
</div>
<script type="text/javascript">
	function del (id) {
		if (confirm("Do you really want to delete")) {
			location.href="index.php?mod=test&do=list&id="+id;
		};
	}

	function show_data(datee,id){
		//alert(id);
		$.ajax({
			url:"module/test/show_Test_Data.php",
			data:{
				test_date: datee,
				id: id
			},
			type:"POST",
			success:function(e){
				$('#test_data').html(e);
			}	
		});
	}

</script>