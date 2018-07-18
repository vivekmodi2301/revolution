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
<input type="hidden" name="datee" value="<?php echo $_POST['datee']; ?>">
<table class="table table-striped" style="width: 80%; margin: 0 auto;">
	<tr>
		<th style="width:80px;">Roll No.</th>
		<th style="width:200px;">Name</th>
        <th>Attendance</th>
	</tr>
	
	<?php
		$sno=1;
		$edit=0;
				$qry="select roll,name from student where class_id=$_POST[class_id]";

		$student_data=fetchAll($qry);
		$smonth="";
		switch ($_POST['month']) {
			case '1':
				$smonth="jan";
				break;
			case '2':
				$smonth="feb";
				break;
			case '3':
				$smonth="march";
				break;
			case '4':
				$smonth="april";
				break;
			case '5':
				$smonth="may";
				break;
			case '6':
				$smonth="june";
				break;
			case '7':
				$smonth="july";
				break;
			case '8':
				$smonth="august";
				break;
			case '9':
				$smonth="september";
				break;
			case '10':
				$smonth="october";
				break;
			case '11':
				$smonth="nov";
				break;
			case '12':
				$smonth="dece";
				break;
		}
		$roll=$student_data[0]['roll'];
		if(totalRow("select roll from $smonth where roll=$roll and datee=$_POST[day]")){
			$edit=1;
		}
		$i=1;
		foreach ($student_data as $student_data)
		 {

	?>
				<tr>
					<td><?php echo $student_data['roll'];?></td>
					<input type="hidden" name="roll<?php echo $i?>" value="<?php echo $student_data['roll'];?>">
					<td><?php echo $student_data['name'];?></td>
					<td>
						<?php 
						if($edit){
							$data=fetch("select status from $smonth where roll=$student_data[roll] and datee=$_POST[day]");
						?>
							<input type="radio" <?php if($data['status']=='p'){echo "checked";}?> required name="attendance<?php echo $i?>" value="p"> P
  						<input type="radio" <?php if($data['status']=='a'){echo "checked";}?> name="attendance<?php echo $i?>" value="a"> A
						<?php 
						}
						else
						{
						?>
						<input type="radio" required name="attendance<?php echo $i?>" value="p"> P
  						<input type="radio" name="attendance<?php echo $i?>" value="a"> A
  						<?php }?>
  					</td>

				</tr>	
	<?php
	$i++;
		}
	?>
	<input type="hidden" value="<?php echo --$i;?>" name="total_stu">
	<tr>
		<th colspan="3" style="text-align:center"><input  type="submit" value="Submit" name="<?php if(!$edit){echo "submit_attendance";}else{echo "edit_attendance";}?>"  class="btn-primary"></th>
	</tr>
</table>