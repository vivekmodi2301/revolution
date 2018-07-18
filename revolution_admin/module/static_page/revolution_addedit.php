<?php
	$id="";
	if(isset($_GET['id'])){
		$id=$_GET['id'];
		$static_page=fetch("select id,page_name,page_description from static_page where id=$id");
	}
	if(isset($_POST['page_name'])){
		$success=1;
		$_POST=array_map("addslashes",$_POST);
		if($success){
			$page_id=addUpdate('static_page',$_POST,$id);
			$priority=array();
			$priority['name']=$_POST['page_name'];
			$au='a';
			if($id)
			{
				$page_id=$id;
				$au='u';
			}
			else
			{
				$max_priority=fetch("select priority from pages_priority order by priority desc");
				$priority['priority']= $max_priority['priority']+1;
			}
			$priority['page_id']=$page_id;
			addUpdate_page_priority('pages_priority',$priority,$page_id,$au);
			header("location:index.php?mod=static_page&do=list");
		}
	}
?>
<form method="post">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
		<table class="table table-striped table-hover">
			<tr>
				<th colspan="2" style="text-align:center">Static Page Form</th>
			</tr>
			<tr>
				<th>Page Name</th>
				<td><input type="text" value="<?php if($id) echo $static_page['page_name'];?>" name="page_name" class="form-control"></td>
			</tr>
			<tr>
				<th>Page Description</th>
				<td><textarea id="editor1" name="page_description" style="height:1000px;" ><?php if($id) echo $static_page['page_description'];?></textarea></td>
			</tr>
			<tr>
				<td colspan="2" style="text-align:center"><input type="submit" value="Submit" class="btn btn-primary"></td>
			</tr>
		</table>
	</div>
	<div class="clearfix"></div>
</form>
<script>
                // Replace the <textarea id="editor1"> with a CKEditor
                // instance, using default configuration.
                CKEDITOR.replace( 'editor1' );
            </script>