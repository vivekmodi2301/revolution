<?php
if (isset($_POST['class'])) {
//echo "<span style='margin-top:100px'>hi";exit;
		$success=1;
		if($success){
			//echo "hi";exit;
			//unset($_POST['submit']);	
			//addupdate('student',$_POST);
			header("location:index.php?mod=test&do=list&class=$_POST[class]");
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
			<th style="widht:50%;">Class</th>
             <?php 
		$q="select id, name from class";
		$ans=fetchall($q); ?>
		
			<td style="widht:50%;"><select name="class" class="form_control" required >
            <option >Select Class</option>
            <?php
            foreach($ans as $ans)
		{
		?>
            <option value="<?php echo $ans['id'] ?>" <?php if(isset($_POST['class'])){echo "selected";}?>><?php echo $ans['name'];?></option><?php } ?>
            
            
            </select>
			</td>
		</tr>
        <tr>
			<th colspan="2" style="text-align:center"><input  type="submit" value="Submit" class="btn-primary"></th>
		</tr>	
	</table>
</form>
</div>
<div class="clearfix"></div>

