<?php
	if (isset($_POST['statuscheckid']) || isset($_POST['deletecheckid'])) 
	{
		$catId=$_POST['category_id'];
		if(isset($_GET['category_id']))
		{
			$catId=$_GET['category_id'];
		}
		if(isset($_POST['delete-btn']))
		{
			foreach ($_POST['deletecheckid'] as $checkid) 
			{
				$photo=fetch("select photo from event_gallery where id=$checkid");
				extract($photo);
				if(is_file("system/event_gallery/$photo"))
				{
					unlink("system/event_gallery/$photo");
				}
				delete('event_gallery',$checkid);
			}
		}
		else if(isset($_POST['edit-btn']))
		{	
			$allData=fetchAll("select id,status from event_gallery where category_id=$catId");
			foreach ($allData as $data) 
			{	
				$flag=0;
				foreach ($_POST['statuscheckid'] as $checkid) 
				{
					if($data['id']==$checkid)
					{
						$flag=1;
						break;
					}
				
				}
				if($flag)
				{
					$data['status']="y";
				}
				else
				{
					$data['status']="n";
				}
				addupdate('event_gallery',$data,$data['id']);
			}
		}
		header("location:index.php?mod=gallery_event&do=event_gallery_list&category_id=$catId");
	}
?>
<form method="post">
	<select name="category_id" onChange="show_event_gallery_list(this.value)">
		<option value="">Select Category</option>
			<?php
				$gallery_category=fetchAll("select id,name from event_gallery_category");
				foreach ($gallery_category as $gallery_category)
				{
				?>
					<option value="<?php echo $gallery_category['id'];?>" <?php if((isset($_POST['category_id'])) &&  ($_POST['category_id']==$gallery_category['id']))
						{?> selected <?php } ?>><?php echo $gallery_category['name'];?></option>
				<?php
				}
				?>
	</select>
	<div id="photoList">
	<table class="table table-striped" >
	<tr>
		<th style=" width:100%; text-align:center">Event Gallery Photo</th>
	</tr>
	<tr>
		<th style="width:100%; text-align:right;"><a href="index.php?mod=gallery_event&do=event_gallery_addedit">Add New</a></th>
	</tr>
	</table>
	</div>
</form>
<script type="text/javascript">
	function show_event_gallery_list(id){
		//alert(id);
		$.ajax({
			url:"module/gallery_event/show_list.php",
			data:"id="+id,
			type:"post",
			success:function(e){
				$('#photoList').html(e);
			}	
		});
	}
</script>

<?php
	if(isset($_POST['category_id']))
	{
		?>
		<script type="text/javascript">
			$('docuemnt').ready(show_event_gallery_list('<?php echo $_POST['category_id']; ?>'))
		</script>
		<?php
	}
	else if(isset($_GET['category_id']))
	{
		?>
		<script type="text/javascript">
			$('docuemnt').ready(show_event_gallery_list('<?php echo $_GET['category_id']; ?>'))
		</script>
		<?php
	}	
?>