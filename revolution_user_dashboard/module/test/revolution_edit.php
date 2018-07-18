<?php
	$id="";
	if(isset($_GET['id'])){
		$id=$_GET['id'];
		$unique_test_data=fetch("select id,roll,subject,portion,scored,out_of,datee from test where id=$id");
		//print_r($unique_test_data);
		//exit;
	}else{
		header("location:index.php");
	}
	if (isset($_POST['submit'])) {

		$success=1;
		
		if($_POST['roll']==''){
			echo "hi";
			$success=0;
			$_SESSION['eroll']="Enter Roll No.";
		}else if(!preg_match("/^[0-9 ]*$/",$_POST['roll'])){
			$success=0;
			$_SESSION['eroll']="Enter proper Roll No.";
		}

		if($_POST['datee']==''){
			//echo "hi";
			$success=0;
			$_SESSION['edatee']="Enter Date";
		}else if(!preg_match("/^[0-9 ]*$/",$_POST['datee'])){
			$success=0;
			$_SESSION['edatee']="Enter proper Date.";
		}
		if($_POST['subject']==''){
			//echo "hi";
			$success=0;
			$_SESSION['esubject']="Enter Subject";
		}
		if($_POST['portion']==''){
			//echo "hi";
			$success=0;
			$_SESSION['eportion']="Enter portion";
		}
		else if(!preg_match("/^[a-z A-Z ]*$/",$_POST['portion'])){
			$success=0;
			$_SESSION['eportion']="Enter proper topic";
		}
		if($_POST['scored']==''){
			//echo "hi";
			$success=0;
			$_SESSION['escored']="Enter score";
		}else if(!preg_match("/^[0-9 ]*$/",$_POST['scored'])){
			$success=0;
			$_SESSION['escored']="Enter proper Score";
		}
		if($_POST['out_of']==''){
			//echo "hi";
			$success=0;
			$_SESSION['eout_of']="Enter Number";
		}else if(!preg_match("/^[0-9 ]*$/",$_POST['out_of'])){
			$success=0;
			$_SESSION['eout_of']="Enter proper Number";
		}

		if($success){
			//echo "hi";exit;
			unset($_POST['submit']);	
			addupdate('test',$_POST,$id);
			header("location:index.php?mod=test&do=list&class=$_GET[class]");
		}
	}
	
?>
	<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 col-lg-offset-4">
<form method="post" enctype="multipart/form-data">
	<table class="table table-striped">
		<tr>
			<th colspan="2" style="text-align:center;">Test</th>
		</tr>
		<tr>
			<th style="widht:50%;">Roll NO.</th>
			<td style="widht:50%;"><input type="number" name="roll" class="form-control" value="<?php if(isset($_POST['roll'])){echo $_POST['roll'];}else{echo $unique_test_data['roll'];}?>">
				
						<br><span><?php if(isset($_SESSION['eroll'])){echo $_SESSION['eroll']; unset($_SESSION['eroll']);}?></span>
			</td>
		</tr>
        <tr>
			<th style="widht:50%;">Date</th>
			<td style="widht:50%;"><input type="text" name="datee" class="form-control" value="<?php if(isset($_POST['datee'])){echo $_POST['datee'];}else{echo $unique_test_data['datee'];}?>">
				
						<br><span><?php if(isset($_SESSION['edatee'])){echo $_SESSION['edatee']; unset($_SESSION['edatee']);}?></span>
			</td>
		</tr>
         <tr>
			<th style="widht:50%;">Subject</th>
             <?php 
		$q="select id, name from subject";
		$ans=fetchall($q); ?>
		
			<td style="widht:50%;"><select name="subject" class="form_control" required >
            <option >Select Subject</option>
            <?php
            foreach($ans as $ans)
		{
		?>
            <option value="<?php echo $ans['id'] ?>" <?php if(isset($_POST['subject'])){echo "selected";}else if( $unique_test_data['subject']){echo "selected";}?>><?php echo $ans['name'];?></option><?php } ?>
            
            
            </select>
			</td>
		</tr>
		<tr>
			<th style="widht:50%;">Test Topic</th>
			<td style="widht:50%;"><input type="text" name="portion" class="form-control" value="<?php if(isset($_POST['portion'])){echo $_POST['portion'];}else{echo $unique_test_data['portion'];}?>">
				
						<br><span><?php if(isset($_SESSION['eportion'])){echo $_SESSION['eportion']; unset($_SESSION['eportion']);}?></span>
			</td>
		</tr>
		<tr>
			<th style="widht:50%;">Marks Obtain</th>
			<td style="widht:50%;"><input type="Number" name="scored" class="form-control" value="<?php if(isset($_POST['scored'])){echo $_POST['scored'];}else{echo $unique_test_data['scored'];}?>">
				
						<br><span><?php if(isset($_SESSION['escored'])){echo $_SESSION['escored']; unset($_SESSION['escored']);}?></span>
			</td>
		</tr>
        <tr>
			<th style="widht:50%;">Marks</th>
			<td style="widht:50%;"><input type="Number" name="out_of" class="form-control" value="<?php if(isset($_POST['out_of'])){echo $_POST['out_of'];}else{echo $unique_test_data['out_of'];}?>">
				
						<br><span><?php if(isset($_SESSION['eout_of'])){echo $_SESSION['eout_of']; unset($_SESSION['eout_of']);}?></span>
			</td>
		</tr>
		<tr>
			<th colspan="2" style="text-align:center"><input name="submit" type="submit" value="Submit" class="btn-primary"></th>
		</tr>	
	</table>
</form>
</div>
<div class="clearfix"></div>


