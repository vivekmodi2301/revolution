<?php
$phpfiles=glob("../../include/php/*.php");
foreach($phpfiles as $phpfile)
   include "$phpfile";
   $roll="";
   $name="";
   $fname="";
   $photo="";
   $email="";
   $whatsapp="";
   $mobile="";
extract($_POST);
		if($roll){
			if(!preg_match("/^[0-9]*$/",$_POST['roll'])){
				echo "Enter roll no.";
			}else{
				$qry="select roll from student where roll='$roll'";
				// echo $qry;
				$data=totalRow($qry);
				if($data){
					echo "Roll no alerady exist";	
				}else{
				?>
				<script type="text/javascript">
				$('#roll').html("");
				</script>
				<?php
			}
			}
		}else if($name){
			if(!preg_match("/^[a-z A-Z ]*$/",$_POST['name'])){
				echo "Enter proper Name.";
			}else{
				?>
				<script type="text/javascript">
				$('#name').html("");
				</script>
				<?php
			}			
		}else if($fname){
			
			if(!preg_match("/^[a-zA-Z ]*$/",$_POST['fname'])){
				echo "Enter proper Father's  Name.";
			}			
			else{
				?>
				<script type="text/javascript">
				$('#fname').html("");
				</script>
				<?php
			}
		}else if($photo){
			$pos=strrpos($photo,'.');
			$ext=substr($photo, $pos+1);
			if($ext=='jpg' ||$ext=='jpeg' ||$ext=='png'){
			?>
				<script type="text/javascript">
				$('#photo').html("");
				</script>
				<?php
			}else{
				echo "Upload only jpg,jpeg,png files";
			}
			?>
			<?php
		}else if($email){
			if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      			echo "Invalid email format"; 
    		}
			else{
				?>
				<script type="text/javascript">
				$('#email').html("");
				</script>
				<?php
			}
		}else if($whatsapp){
			if(!preg_match("/^[0-9]*$/",$_POST['whatsapp'])){
				echo "Enter whatsapp no.";
			}else{
				?>
				<script type="text/javascript">
				$('#whatsapp').html("");
				</script>
				<?php
			}
		}else if($mobile){
			if(!preg_match("/^[0-9]*$/",$_POST['mobile'])){
				echo "Enter mobile no.";
			}else{
				?>
				<script type="text/javascript">
				$('#moible').html("");
				</script>
				<?php
			}
		}

?>