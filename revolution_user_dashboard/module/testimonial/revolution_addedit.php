<?php
	 $id="";
	 if(isset($_GET['id'])){
	 	$id=$_GET['id'];
	 	$data=$dbobj->fetchone("select id,name,message,roll from testimonial where id=$id");
	 }
	 if(isset($_POST['message'])){
	 	$_POST['roll']=$_SESSION['ulogindtl']['roll'];
		addupdate('testimonial',$_POST,$id);
		header("location:index.php?mod=testimonial&do=addedit");
	}
  ?>

<form method="post">
	<table class="table table-stripped">
		<tr>
			<td>Submit a meassage</td>
			<td><input  type="message" name="message">
			</td>
		</tr>
		<tr>
			<td><input type="submit" value="SUBMIT">
				
			</td>
		</tr>
	</table>
	

</form>