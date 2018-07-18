<?php 
session_start();
ob_start();
//echo md5("9024555623");
$in=glob('../../include/php/*.php');
foreach($in as $file)
{
	include_once($file);
}
extract($_POST);
if($roll==$_SESSION['ulogindtl']['roll']){
	$pass=md5($pass);
	$qry="select pass from student where roll='$roll'";
	$data=fetch($qry);
	if($pass==$data['pass']){
		?>
		<input type="submit" value="Submit">
<script type="text/javascript">
	$('#showpass').html("");
	$('#showroll').html("");
	$('#npass').removeAttr("disabled");
</script>
<?php 
	}else{
		?>
<script type="text/javascript">
	$('#showpass').html("Password does not match");
	$('#npass').attr("disabled","disabled");
</script>
<?php 	
	}
}else{
	?>
<script type="text/javascript">
	$('#showroll').html("Roll no does not match");
	$('#npass').attr("disabled","disabled");
</script>
	<?php
}
?>