	<link rel="stylesheet" type="text/css" href="../../system/css/bootstrap.min.css">
	<?php
		include_once("../../system/php/config.php");
		include_once("../../system/php/function.php");
		$school_gallery_data=fetchAll("select id,category_id,photo,status from school_gallery where category_id=$_POST[id]");
		$totalRow=count($school_gallery_data);
	?>
	<table class="table table-striped" id="photoList">
	<tr>
		<th colspan="<?php if($totalRow<8){ echo $totalRow;}else{ echo 8;} ?>" style="text-align:center;">School Gallery Photo</th>
	</tr>
	<tr>
		<th colspan="<?php if($totalRow<8){ echo $totalRow;}else{ echo 8;} ?>">
			<div style="text-align:left; width=50%; float:left;"><a href="#" onclick="EnableDelete()">Delete</a>&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;
			<a href="#" onclick="EditStatus()">Edit</a> </div>
			<div style="text-align:right; width=50%; float:right;"><a href="index.php?mod=gallery_school&do=school_gallery_addedit">Add New</a></div>
		</th>
		
	</tr>
	<tr>
		<?php 
		$i=1;
		foreach ($school_gallery_data as $school_gallery_data) {
			if($i<8)
			{
		?>
				<td class="rowOrNot"><img src="system/school_gallery/<?php echo $school_gallery_data['photo'];?>" style="text-align:center" height="100px" width="100px">
					<br><input name="statuscheckid[]" type="checkbox" class="statuscheck" value="<?php echo $school_gallery_data['id'];?>" <?php if($school_gallery_data['status'] === 'y') echo 'checked="checked"';?> disabled>
					<input name="deletecheckid[]" type="checkbox" class="deletecheck" value="<?php echo $school_gallery_data['id'];?>" hidden>
				</td>
				<?php $i++;
			}
			else
			{
				
				$i=1;
				?>
				</tr>
				<tr>	
				<?php
			}
		}
	?>
	</tr>
	<tr>
		<th colspan="<?php if($totalRow<8){ echo $totalRow;}else{ echo 8;} ?>" style="text-align:right">
			<input  type="submit" id="edit-btn" name="edit-btn" value="Edit" class="btn-primary" hidden>
			<input  type="submit" id="delete-btn" name="delete-btn" value="Delete" class="btn-primary" hidden></th>
	</tr>
	</table>
	<script type="text/javascript">
		function EnableDelete() {
			$('.statuscheck').prop("disabled",true);
			$('.deletecheck').removeAttr("hidden");
			$('#edit-btn').prop("hidden",true);
			var displayOrNot = document.getElementsByClassName('rowOrNot');
			if (displayOrNot.length > 0) 
			{
				$('#delete-btn').prop("hidden",false);
			}
	}
    function EditStatus() {
			$('.statuscheck').prop("disabled",false);
			$('.deletecheck').prop("hidden",true);
			$('#delete-btn').prop("hidden",true);
			var displayOrNot = document.getElementsByClassName('rowOrNot');
			if (displayOrNot.length > 0) 
			{
				$('#edit-btn').prop("hidden",false);
			}
	}	
</script>	