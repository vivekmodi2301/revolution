<?php
		$unique_student_data=fetch("select id,class_id,name,gender, father_name , email, dob , address , whatsapp_no , mobile , previous_school , board , previous_per , photo , pass , datee from student where id=$uid");
		//echo "select id,class_id,name,gender, father_name , email, dob , address , whatsapp_no , mobile , previous_school , board , previous_per , photo , pass , datee from student where id=$uid";
		//print_r($unique_student_data);
		//exit;

	if (isset($_POST['submit'])) {

		$success=1;


		if ($_FILES['photo']['name']) {
	//print_r($_FILES);
		//exit;
			//echo "hi";exit;

			if ($_FILES['photo']['type']=='image/jpeg' || $_FILES['photo']['type']=='image/png') {
				if(isset($_POST['photo']) ){
					unlink("system/student/$_POST[photo]");
				}
				if(isset($unique_student_data['photo'])){
					unlink("../revolution_admin/revolution_admin_dashboard/system/student/$unique_student_data[photo]");
				}
				$_POST['photo']=time()."_revolution_".$_FILES['photo']['name'];
			move_uploaded_file($_FILES['photo']['tmp_name'],'../revolution_admin/revolution_admin_dashboard/system/student/'.$_POST['photo']);
			}else{
				$success=0;
				$_SESSION['efile']="Upload only jpeg or png file";
			}
		}
		else{

			//echo "hii";exit;
			if (!isset($_POST['photo'])) {
				//echo "hiii";exit;
				$success=0;
				$_SESSION['efile']="Upload a photo";
				//echo $_SESSION['efile'];exit;
			}
		}


		if($_POST['name']==''){
			//echo "hi";
			$success=0;
			$_SESSION['ename']="Enter name";
		}else if(!preg_match("/^[a-z A-Z ]*$/",$_POST['name'])){
			$success=0;
			$_SESSION['ename']="Enter proper name";
		}
		if($_POST['father_name']==''){
			//echo "hi";
			$success=0;
			$_SESSION['father']="Enter father name";
		}else if(!preg_match("/^[a-z A-Z ]*$/",$_POST['father_name'])){
			$success=0;
			$_SESSION['father']="Enter proper name";
		}
		if($_POST['previous_school']==''){
			//echo "hi";
			$success=0;
			$_SESSION['prescl']="Enter school name";
		}else if(!preg_match("/^[a-z A-Z ]*$/",$_POST['previous_school'])){
			$success=0;
			$_SESSION['prescl']="Enter proper school name";
		}
		if($_POST['mobile']==''){
			//echo "hi";
			$success=0;
			$_SESSION['mobile']="Enter mobile no.";
		}
		else if(!preg_match("/^[0-9 ]*$/",$_POST['mobile'])){
			$success=0;
			$_SESSION['mobile']="Enter proper mobile no.";
		}
		if($_POST['whatsapp_no']==''){
			//echo "hi";
			$success=0;
			$_SESSION['what']="Enter mobile no.";
		}
		else if(!preg_match("/^[0-9 ]*$/",$_POST['whatsapp_no'])){
			$success=0;
			$_SESSION['what']="Enter proper mobile no.";
		}

		if (isset($_POST['gender'])) {
			if ($_POST['gender']=='male' || $_POST['gender']=='female')
			{

			}
			else{
				$success=0;
				$_SESSION['gender']="Select gender";
			}
		}
		else{
			$success=0;
			$_SESSION['gender']="Select gender";
		}

		if($success){
			//echo "hi";exit;
			unset($_POST['submit']);
			addupdate('student',$_POST,$uid);
			header("location:index.php");
		}


	}
?>
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
<form method="post" enctype="multipart/form-data">
	<table class="table table-striped">
		<tr>
			<th colspan="2" style="text-align:center;">Student</th>
		</tr>
		<tr>
			<th style="widht:50%;">Name</th>
			<td style="widht:50%;"><input type="text" name="name" class="form-control" onBlur="validateName(this.value)" value="<?php if(isset($_POST['name'])){echo $_POST['name'];}else{echo $unique_student_data['name'];}?>">

						<br><span id="name"><?php if(isset($_SESSION['ename'])){echo $_SESSION['ename']; unset($_SESSION['ename']);}?></span>
			</td>
		</tr>
         <tr>
			<th style="widht:50%;">Class</th>
             <?php
		$q="select id, name from class";
		$ans=fetchall($q); ?>

			<td style="widht:50%;"><select name="class_id" class="form_control" required >
            <option >Select Class</option>
            <?php
            foreach($ans as $ans)
		{
		?>
            <option <?php if(isset($_POST['class_id'])){echo "selected";} else if($unique_student_data['class_id']){echo "selected";}?> value="<?php echo $ans['id'] ?>" ><?php echo $ans['name'];?> </option> <?php } ?>


            </select>
			</td>
		</tr>
		<tr>
			<th style="widht:50%;">Father's name</th>
			<td style="widht:50%;"><input type="text" name="father_name" class="form-control" onBlur="validatefName(this.value)" value="<?php if(isset($_POST['father_name'])){echo $_POST['father_name'];}else{echo $unique_student_data['father_name'];}?>">

						<br><span id="fname"><?php if(isset($_SESSION['father'])){echo $_SESSION['father']; unset($_SESSION['father']);}?></span>
			</td>
		</tr>

		<?php
			if (isset($_POST['photo'])) {
				?>
				<tr>
					<td colspan="2"><img src="../revolution_admin/revolution_admin_dashboard/system/student/<?php echo $_POST['photo'];?>" height="100px" width="100px"><input type="hidden" name="photo" value="<?php echo $unique_student_data['photo'];?>">
					</td>
				</tr>
				<?php
			}
		?>
		<?php
			if (isset($unique_student_data['photo'])) {
				?>
				<tr>
					<td colspan="2"><img src="../revolution_admin/revolution_admin_dashboard/system/student/<?php echo $unique_student_data['photo']?>" height="100px" width="100px"><input type="hidden" name="photo" value="<?php echo $unique_student_data['photo'];?>">
					</td>
				</tr>
				<?php
			}
		?>
		<tr>
			<th style="widht:50%;">Photo</td>
			<td style="widht:50%;"><input onBlur="validatePhoto(this.value)" type="file" name="photo">
				<br><span id="photo"><?php if(isset($_SESSION['efile'])){echo $_SESSION['efile']; unset($_SESSION['efile']);} ?></span>
			</td>
		</tr>
		<tr>
			<th style="widht:50%;">E_Mail</th>
			<td style="widht:50%;"><input onBlur="validateEmail(this.value)" type="text" name="email" class="form-control" value="<?php if(isset($_POST['email'])){echo $_POST['email'];}else{echo $unique_student_data['email'];}?>">

						<br><span id="email"><?php if(isset($_SESSION['email'])){echo $_SESSION['email']; unset($_SESSION['email']);}?></span>
			</td>
		</tr>
		<tr>
			<th>Gender</td>
			<td>
				<input type="radio" <?php
				 if (isset($_POST['gender']) && $_POST['gender']=='male') {
					echo "checked";
				}if ($unique_student_data['gender']=='male') {
					echo "checked";
				}

				?>
				name="gender" value="male">Male
				<input type="radio" <?php
				 if (isset($_POST['gender']) && $_POST['gender']=='female') {
					echo "checked";
				}
					else if($unique_student_data['gender']=='female'){
						echo "checked";
					}
				?>
				name="gender" value="female">Female
				<br><span><?php if(isset($_SESSION['gender'])){echo $_SESSION['gender']; unset($_SESSION['gender']);}?></span>
			</td>
		</tr>
        <tr>
			<th style="widht:50%;">Date of Birth</th>
			<td style="widht:50%;"><input type="text" name="dob" class="form-control" value="<?php if(isset($_POST['dob'])){echo $_POST['dob'];}else{echo $unique_student_data['dob'];}?>" required >
			</td>
		</tr>
        <tr>
			<th style="widht:50%;">Address</th>
			<td style="widht:50%;"><input type="text" name="address" class="form-control" value="<?php if(isset($_POST['address'])){echo $_POST['address'];}else{echo $unique_student_data['address'];}?>">

						<br><span><?php if(isset($_SESSION['address'])){echo $_SESSION['address']; unset($_SESSION['address']);}?></span>
			</td>
		</tr>
        <tr>
			<th style="widht:50%;">Whatsapp_No</th>
			<td style="widht:50%;"><input onBlur="validateWhatsapp(this.value)" type="text" name="whatsapp_no" class="form-control" value="<?php if(isset($_POST['whatsapp_no'])){echo $_POST['whatsapp_no'];}else{echo $unique_student_data['whatsapp_no'];}?>">

						<br><span id="whatsapp"><?php if(isset($_SESSION['what'])){echo $_SESSION['what']; unset($_SESSION['what']);}?></span>
			</td>
		</tr>
        <tr>
			<th style="widht:50%;">Mobile</th>
			<td style="widht:50%;"><input onBlur="validateMobile(this.value)" type="text" name="mobile" class="form-control" value="<?php if(isset($_POST['mobile'])){echo $_POST['mobile'];}else{echo $unique_student_data['mobile'];}?>">

						<br><span id="mobile"><?php if(isset($_SESSION['mobile'])){echo $_SESSION['mobile']; unset($_SESSION['mobile']);}?></span>
			</td>
		</tr>
        <tr>
			<th style="widht:50%;">Previous School Name</th>
			<td style="widht:50%;"><input type="text" name="previous_school" class="form-control" value="<?php if(isset($_POST['previous_school'])){echo $_POST['previous_school'];}else{echo $unique_student_data['previous_school'];}?>">

						<br><span><?php if(isset($_SESSION['prescl'])){echo $_SESSION['prescl']; unset($_SESSION['prescl']);}?></span>
			</td>
		</tr>
        <tr>
			<th style="widht:50%;">Board</th>
			<td style="widht:50%;"><input type="text" name="board" class="form-control" value="<?php if(isset($_POST['board'])){echo $_POST['board'];}else{echo $unique_student_data['board'];}?>"required >
			</td>
		</tr>
        <tr>
			<th style="widht:50%;">Previous Percantage</th>
			<td style="widht:50%;"><input type="text" name="previous_per" class="form-control" value="<?php if(isset($_POST['previous_per'])){echo $_POST['previous_per'];}else{echo $unique_student_data['previous_per'];}?>" required >
			</td>
		</tr>
        <tr>
			<th style="widht:50%;">Date</th>
			<td style="widht:50%;"><input type="text" name="datee" class="form-control" value="<?php if(isset($_POST['datee'])){echo $_POST['datee'];}else{echo $unique_student_data['datee'];}?>" required >
			</td>
		</tr>
		<tr>
			<th colspan="2" style="text-align:center"><input name="submit" type="submit" value="Submit" class="btn-primary"></th>
		</tr>
	</table>

</form>
</div>
<div class="clearfix"></div>

<script>
	function validateroll(roll){
		//alert(sid);
		$.ajax({
			url:"module/student/revolution_ajax.php",
			data:"roll="+roll,
			type:"post",
			success:function(e){
				$('#roll').html(e);
			}
		});	
	}
</script>

<script>
	function validateName(name){
		//alert(sid);
		$.ajax({
			url:"module/student/revolution_ajax.php",
			data:"name="+name,
			type:"post",
			success:function(e){
				$('#name').html(e);
			}
		});	
	}
</script>


<script>
	function validatefName(fname){
		//alert(sid);
		$.ajax({
			url:"module/student/revolution_ajax.php",
			data:"fname="+fname,
			type:"post",
			success:function(e){
				$('#fname').html(e);
			}
		});	
	}
</script>


<script>
	function validatePhoto(photo){
		// alert(photo);
		$.ajax({
			url:"module/student/revolution_ajax.php",
			data:"photo="+photo,
			type:"post",
			success:function(e){
				$('#photo').html(e);
			}
		});	
	}
</script>


<script>
	function validateEmail(email){
		//alert(sid);
		$.ajax({
			url:"module/student/revolution_ajax.php",
			data:"email="+email,
			type:"post",
			success:function(e){
				$('#email').html(e);
			}
		});	
	}
</script>


<script>
	function validateWhatsapp(fname){
		//alert(sid);
		$.ajax({
			url:"module/student/revolution_ajax.php",
			data:"whatsapp="+whatsapp,
			type:"post",
			success:function(e){
				$('#whatsapp').html(e);
			}
		});	
	}
</script>


<script>
	function validateMobile(mobile){
		//alert(sid);
		$.ajax({
			url:"module/student/revolution_ajax.php",
			data:"mobile="+mobile,
			type:"post",
			success:function(e){
				$('#mobile').html(e);
			}
		});	
	}
</script>