<?php
	if(isset($_POST['roll'])){
		$_POST=array_map('addslashes',$_POST);
		extract($_POST);
		$password=md5($password);
		$qry="select id,roll,pass from student where roll='$roll' and pass='$password'";
		echo $qry;
		if(totalRow($qry)){
			$_SESSION['ulogindtl']=fetch($qry);
			header("location:index.php");
			//print_r($_SESSION);
		}else{
			//echo "hi";exit;

			$_SESSION['elogin']="Enter correct username and password";
			
			header("location:index.php");
		}
	}
?>
<script src="https://use.fontawesome.com/4d5d722b86.js"></script>
<form method="post">
<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 col-lg-offset-4 col-md-offset-4" style="margin-top:50px">
<table class="table table-striped">
	<tr>
		<th colspan="2" style="text-align:center">Student Login</th>
	</tr>
	<?php if(isset($_SESSION['elogin'])){?>
	<tr>
		<td colspan="2"><?php echo $_SESSION['elogin'];?></td>
	</tr>
	<?php unset($_SESSION['elogin']); }?>
	<tr>
		<th>Roll No.</th>
		<td><div class="input-group">
      	<div class="input-group-addon"><i class="fa fa-user-circle-o" aria-hidden="true"></i>
		</div>
      	<input type="text" class="form-control" value="" id="exampleInputAmount" placeholder="Enter your roll no." name="roll"></td>
	</tr>
	<tr>
		<th>Password</th>
		<td><div class="input-group">
      	<div class="input-group-addon"><i class="fa fa-key" aria-hidden="true"></i>
		</div>
      	<input type="password" class="form-control" value="" id="exampleInputAmount" placeholder="Password" name="password"></td>
	</tr>
	<tr>
		<td colspan="2" style="text-align:center"><input type="submit" class="btn btn-primary" value="Login"></td>
	</tr>
</table>
</div>
<div class="clearfix"></div>
</form>