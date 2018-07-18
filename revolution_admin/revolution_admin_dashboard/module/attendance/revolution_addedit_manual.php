<?php 
	// print_r($_POST);
	if(isset($_POST['submit_attendance'])){
		extract($_POST);
		$submit_data=array();
		$smonth="";
		switch ($month) {
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
		$submit_data['datee']=$day;
		for($i=1;$i<=$total_stu;$i++){
			$submit_data['roll']=$_POST["roll$i"];
			$submit_data['status']=$_POST["attendance$i"];
			addUpdate($smonth,$submit_data);
		}

		header("location:index.php?mod=attendance&do=addeditm");
		// print_r($submit_data);
	}
	if(isset($_POST['edit_attendance'])){
		extract($_POST);
		$submit_data=array();
		$smonth="";
		switch ($month) {
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
		$submit_data['datee']=$day;
		for($i=1;$i<=$total_stu;$i++){
			update_att($smonth,$_POST["attendance$i"],$_POST["roll$i"]);
		}
		header("location:index.php?mod=attendance&do=addeditm");

		// print_r($submit_data);
	}
 ?>
<form role="form" class="form-horizontal" enctype="multipart/form-data" method="post">
<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 col-lg-offset-4">
	<table class="table table-striped">
		<tr>
			<th colspan="2" style="text-align:center;">Attendance</th>
		</tr>
        <tr>
			<th style="widht:50%;">Class</th>
			<td style="widht:50%;">
				<?php 
				$q="select id, name from class";
				$ans=fetchall($q); ?>
				
				<select name="class_id" class="form_control" required >
            		<option value="">Select Class</option>
            			<?php
            				foreach($ans as $ans)
							{
						?>
           						 <option value="<?php echo $ans['id'] ?>" <?php if(isset($_POST['class_id']) && $_POST['class_id']==$ans['id']){echo "selected";}?>><?php echo $ans['name'];?></option>
           				<?php 
           					} 
           				?>
            	</select>
				<br>
				<span><?php if(isset($_SESSION['eclass'])){echo $_SESSION['eclass']; unset($_SESSION['eclass']);}?></span>
			</td>
		</tr>
        <tr>
			<th style="widht:50%;">Date</th>
			<td style="widht:50%;"><input type="date" id="datee" name="datee" max="<?php echo date("Y-m-d"); ?>" class="form-control" value="<?php if(isset($_POST['datee'])){echo $_POST['datee'];}?>" required >
			<br>
			<span><?php if(isset($_SESSION['edate'])){echo $_SESSION['edate']; unset($_SESSION['edate']);}?></span>
			</td>
		</tr>
		<tr>
			<th colspan="2" style="text-align:center"><input  type="submit" value="Submit" name="submit"  class="btn-primary"></th>
		</tr>	
	</table>
	<input type="hidden" name="day" id="day">
	<input type="hidden" name="month" id="month">
	<input type="hidden" name="year" id="year">
	</div>
	<div id="display">

	</div>
   	 
</form>

<div class="clearfix"></div>
<script>
 function alist(class_id,datee)
	{
		var date=new Date($('#datee').val());
		var day=date.getDate();
		var month=date.getMonth()+1;
		var year=date.getFullYear();
		$('#day').val(day);
		$('#month').val(month);
		$('#year').val(year);
		$.ajax({
			url:"module/attendance/alist.php",
			data:"class_id="+class_id+"&datee="+datee+"&day="+day+"&month="+month,
			type:'POST',
			success: function(rs){
				
				$('#display').html(rs)
				}
			});
		}
</script>

<?php
	$success=1;
	extract($_POST);
	
	if(isset($_POST['class_id']))
	{
		if($_POST['class_id']==''){
		$success=0;
		$_SESSION['eclass_id']="Select category";
		}
	
		if($_POST['datee']=='')
		{
			$success=0;
			$_SESSION['edate']="Select Date";
		}
	if($success)
	{
?>
		<script type="text/javascript">
			$('docuemnt').ready(alist('<?php echo $_POST['class_id']; ?>','<?php echo $_POST['datee']; ?>'))
		</script>
<?php
	}
}
?>