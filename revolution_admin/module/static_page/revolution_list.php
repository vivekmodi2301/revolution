
<?php
 //include "function.php";
if(isset($_GET['id']))
{
	
	delete('static_page',$_GET['id']);
	delete_page_priority('pages_priority',$_GET['id']);
	header("location:index.php?mod=static_page&do=list");
}
?>
<table  style="min-width:1000px;" class="table table-striped table-hover">
<tr>
<th colspan="4" style="text-align:center">
Static Page List
</th>
</tr>
<tr><th colspan="4" style="text-align:right"><a href="index.php?mod=static_page&do=addedit">Add New</a></th>
</tr>
<tr>
<th>S.No</th>
<th>Menu</th>

<th>Action</th>
</tr>
<?php
$static_page=fetchall("select id,page_name,page_description from static_page");

$info=1;
foreach($static_page as $static_page)
{
	
	?>
	<tr>
    <th><?php echo $info++;?></th>
    <th><?php echo $static_page['page_name'];?></th>
    <th><a href="index.php?mod=static_page&do=addedit&id=<?php echo $static_page['id'];?>"> edit </a>
    &nbsp; &nbsp;|| &nbsp; &nbsp;
    
  <a href="#" onClick="dldt('<?php echo $static_page['id'];?>')">Delete</a>
  </th>
    </tr>
    
    <?php
}
?>
    </table>
    <script>
	function dldt(id)
	{
		if(confirm("u want to delete this?"));
		{
			location.href="index.php?mod=static_page&do=list&id="+id;
		}
		
	}
	</script>