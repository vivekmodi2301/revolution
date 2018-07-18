<SCRIPT language="javascript">
function add(type) {

	//Create an input type dynamically.
	var element = document.createElement("input");

	//Assign different attributes to the element.
	element.setAttribute("type", "text");
	element.setAttribute("name", "subject[]");
	element.setAttribute("class", "form-control");


	var foo = document.getElementById("subjectBar");

	//Append the element in page (in span).
	foo.appendChild(element);

}
</SCRIPT>

<?php
/*<?php if(isset($_POST['photo'])){?> title="<?php echo $_POST['photo']['name'];?>" <?php } ?>*/
	if (isset($_POST['name'])) {

		$success=1;

		if($_POST['name']==''){
			//echo "hi";
			$success=0;
			$_SESSION['ename']="Enter name";
		}else if(!preg_match("/^[a-z A-Z 0-9]*$/",$_POST['name'])){
			$success=0;
			$_SESSION['ename']="Enter proper name";
		}



		if (isset($_POST['status'])) {
			if ($_POST['status']=='y' || $_POST['status']=='n')
			{

			}
			else{
				$success=0;
				$_SESSION['estatus']="Select status";
			}
		}
		else{
			$success=0;
			$_SESSION['estatus']="Select status";
		}

		if($success){
			//echo "hi";exit;
			unset($_POST['submit']);
			$classTable= array('name'=>$_POST['name'],'status'=>$_POST['status']);
			$classId=addupdate('class',$classTable);
			//$classId=1;
			//echo $classId;exit;
			foreach ($_POST['subject'] as $subject)
			{
				$subjectTable=array('class_id'=>$classId,'name'=>$subject);
				addupdate('subject',$subjectTable);
			}
			header("location:index.php?mod=class_subject&do=addedit");
		}


	}
?>
<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 col-lg-offset-4">
<form method="post" enctype="multipart/form-data">
	<table class="table table-striped">
		<tr>
			<th colspan="2" style="text-align:center;">Class</th>
		</tr>
		<tr>
			<th style="widht:50%;">Name</th>
			<td style="widht:50%;"><input type="text" name="name" class="form-control" value="<?php if(isset($_POST['name'])){echo $_POST['name'];}?>">

						<br><span><?php if(isset($_SESSION['ename'])){echo $_SESSION['ename']; unset($_SESSION['ename']);}?></span>
			</td>
		</tr>
		<tr>
			<th style="widht:50%;">Subject</th>
			<td style="widht:50%;">
				<span id="subjectBar">
					<?php
						if(isset($_POST['subject']))
						{
							foreach ($_POST['subject'] as $subject)
							{
					?>
								<input type="text" name="subject[]" class="form-control" value="<?php echo $subject;?>">
					<?php
							}
						}
					?></span>
				<a href="javascript:add()">Add Subject</a>

			</td>
		</tr>
		<tr>
			<th>Show</th>
			<td>
				<input type="radio" <?php if (isset($_POST['status']) && $_POST['status']=='y') {
					echo "checked";
				}?> name="status" value="y">Yes
				<input type="radio" <?php if (isset($_POST['status']) && $_POST['status']=='n') {
					echo "checked";
				}?> name="status" value="n">No
				<br><span><?php if(isset($_SESSION['estatus'])){echo $_SESSION['estatus']; unset($_SESSION['estatus']);}?></span>
			</td>
		</tr>
		<tr>
			<th colspan="2" style="text-align:center"><input  type="submit" value="Submit" class="btn-primary"></th>
		</tr>
	</table>
</form>
</div>
<div class="clearfix"></div>
