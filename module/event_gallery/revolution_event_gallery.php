
<div class="content">
		<div class="container">
			<h3 class="single">Photos of the selected category</h3>

			<div class="main-content">
				<div id="sli" class="slider-con">
					
				</div>
			</div>
			
			<aside id="sidebar">
				<div class="widget sidemenu">
					<ul>
						<?php
							$event_category_data=fetchAll("select id,name from event_gallery_category");
							foreach ($event_category_data as $event_category_data) 
							{
								$event_photo_count=fetchAll("select id,category_id,photo,status from event_gallery where category_id=$event_category_data[id] and status='y'");
								$totalRow=count($event_photo_count);
								if($totalRow>0)
								{

						?>
						<li name="selected_category" 
							value="<?php echo $event_category_data['id']; ?>">
							<a href="#"><?php echo $event_category_data['name']?><span class="nr"><?php echo $totalRow;?></span></a></li>
						<?php
								}
							}
						?>
						
					</ul>
				</div>
			</aside>
			<!-- / sidebar -->
	
		</div>
		<!-- / container -->
	</div>
</div>
<script type="text/javascript">
$('ul li a').on('click', function(){
    $(this).parent().addClass('current').siblings().removeClass('current');
    var a=$(this).parent().val();

    $.ajax({
			url:"module/event_gallery/show_img.php",
			data:"id="+a,
			type:"post",
			success:function(e){
				$('#sli').html(e);
			}
		});
});
</script>