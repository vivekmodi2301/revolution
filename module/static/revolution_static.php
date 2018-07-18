<div style="padding-bottom:50px; padding-top:50px;">
<?php
	if(isset($_GET['id'])){
		$static_page=fetchOne("select page_description from static_page where  id=$_GET[id]");
// print_r($static_page);//exit;
		if($static_page){
			$static_page=array_map('stripslashes', $static_page);
			echo $static_page['page_description'];
			?>
			<?php
		}else{
			header("location:index.php");
		}
	}
?>
</div>
</div>