<?php 
	if(isset($_POST['pass'])){
		$id=$_SESSION['ulogindtl']['id'];
		$_POST['pass']=md5($_POST['pass']);
		addUpdate('student',$_POST,$id);
		$_SESSION['success_change_pass']="Password Successfully Changed";
		header("location:index.php?mod=login&do=change_pass");
	}
?>
<form method="post">
	<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 col-lg-offset-4 col-md-offset-4" style="margin-top:50px">
		<table class="table table-striped">
			<tr>
				<th colspan="2">Change Password form</th>
			</tr>
			<?php 
				if(isset($_SESSION['success_change_pass'])){
					?>
					<tr>
						<th colspan="2"><?php echo $_SESSION['success_change_pass']; unset($_SESSION['success_change_pass']);?></th>
					</tr>
					<?php
				}
			?>
			<tr>
				<th>Roll No.</th>
				<td><input id="roll" type="text" ><br>
					<span id="showroll"></span>
				</td>
			</tr>
			<tr>
				<th>Old Password</th>
				<td><input onkeyup="checkpass(this.value)"  type="text" ><br>
					<span id="showpass"></span>

				</td>
			</tr>
			<tr>
				<th>New Password</th>
				<td><input id="npass"  disabled type="password" name="pass"></td>
			</tr>
			<tr>
				<td colspan="2" id="abc"></td>
			</tr>
		</table>
	</div>
</form>
<script type="text/javascript">
	function checkpass(pass){
		var roll=$('#roll').val();
		$.ajax({
			url:"module/login/checkpass.php",
			data:"pass="+pass+"&roll="+roll,
			type:"post",
			success:function(e){
				$('#abc').html(e);
			}
		});
	}
</script>