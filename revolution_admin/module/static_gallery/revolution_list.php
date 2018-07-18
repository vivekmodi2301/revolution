<?php
	if (isset($_GET['id'])) {
		$id=$_GET['id'];
		$photo=fetch("select photo from static_gallery where id=$id");
		extract($photo);
		if(is_file("system/static_gallery/$photo")){
			unlink("system/static_gallery/$photo");
		}
		delete('static_gallery',$id);
		header("location:index.php?mod=static_gallery&do=list");
	}
?>
<table class="table table-striped">
	<tr>
		<th colspan="3" style="text-align:center">Static Page Photo List</th>
	</tr>
	<tr>
		<th>S.No.</th>
		<th>Photo</th>
		<th>Action</th>
	</tr>
	<tr>
		<th colspan="3" style="text-align:right;"><a href="index.php?mod=static_gallery&do=addedit">Add New</a></th>
	</tr>
	<?php
		$sno=1;
		$slider_data=fetchAll("select id,photo from static_gallery");
		foreach ($slider_data as $slider_data) {
			?>
				<tr>
					<td><?php echo $sno++;?></td>
					<td><img src="system/static_gallery/<?php echo $slider_data['photo'];?>" height="30px" width="30px"></td>
					
					<td>
						<button class="btn btn-primary" data-link="<?php echo ROOT;?>static_gallery/<?php echo $slider_data['photo'];?>">Copy</button>&nbsp;&nbsp;|&nbsp;&nbsp;
						<a href="#" onClick="del('<?php echo $slider_data['id'];?>')">Delete</td>
				</tr>	
			<?php
		}
	?>
</table>
<script type="text/javascript">
	function del (id) {
		if (confirm("Do you really want to delete")) {
			location.href="index.php?mod=static_gallery&do=list&id="+id;
		};
	}
</script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/gsap/1.18.0/TweenMax.min.js"></script>
<script type="text/javascript">
	//just for copy-to-clipboard functionality (add data-link attribute to any element)
(function() {
  document.body.addEventListener('click', copy, true);
  var copyElement = document.createElement("textarea");
  copyElement.style.display = "none";
  document.body.appendChild(copyElement);
  function copy(e) {
    var c = e.target.dataset.link;
    copyElement.value = c;
    if (c && copyElement.select) {
      copyElement.style.display = "block";
      copyElement.select();
      try {
        document.execCommand('copy');
        copyElement.blur();
        TweenLite.fromTo(e.target.parentNode, 0.6, {color:"white"}, {color:"#989898"});
      } catch (err) {
        alert('please press Ctrl/Cmd+C to copy');
        alert(err);
      }
      copyElement.style.display = "none";
    }
  }
})();
</script>