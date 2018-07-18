
<div class="content">
		<div class="gcontainer">
			<h3 class="single">Photos of the selected category</h3>

			<div class="main-content">
				<div id="sli" class="slider-con">
					
				</div>
			</div>
			<aside id="sidebar">
				<div class="widget sidemenu">
					<ul>
						<?php
							$school_category_data=fetchAll("select id,name from school_gallery_category");
							foreach ($school_category_data as $school_category_data) 
							{
								$school_photo_count=fetchAll("select id,category_id,photo,status from school_gallery where category_id=$school_category_data[id] and status='y'");
								$totalRow=count($school_photo_count);
								if($totalRow>0)
								{

						?>
						<li name="selected_category" 
							value="<?php echo $school_category_data['id']; ?>">
							<a href="#"><?php echo $school_category_data['name']?><span class="nr"><?php echo $totalRow;?></span></a></li>
						<?php
								}
							}
						?>
						
					</ul>
				</div>
			</aside>
			<!-- / sidebar -->
	
		</div>
		<div class="clearfix"></div>
		<!-- / container -->
		<!-- team -->
	<div class="team" id="team">
			<h3 class="heading"><span>Our Faculties</span></h3>
		<div class="container">
			<div class="inner_w3l_agile_grids">
				<div id="horizontalTab">
						<ul class="resp-tabs-list">
							<?php $faculty_data=fetchAll("select id,name,photo,subject,experince,status from faculty where status='y'");
							foreach ($faculty_data as $faculty_data) 
							{
							?>
						<li>
							<img src=<?php echo SITE_IMAGES."faculty/$faculty_data[photo]";?> alt=" " class="img-responsive" />
						</li>
						<?php } ?>
					
						</ul>
						<div class="resp-tabs-container" >
							<?php
							$faculty_data=fetchAll("select id,name,photo,subject,experince,status from faculty where status='y'");
							foreach ($faculty_data as $faculty_data) 
							{
							?>
							<div class="tab1">
								<div class="col-md-6 team-img-w3-agile" style="background:url(<?php echo SITE_IMAGES."faculty/$faculty_data[photo]";?>) no-repeat 0px 0px; background-size:cover">
								</div>
								<div class="col-md-6 team-Info-agileits">
									<h4><?php echo $faculty_data['name'];?></h4>
									<span><?php echo  $faculty_data['subject'];?></span>
									<p class="phone"><b>Experince</b> <?php echo  $faculty_data['experince'];?></p>
															
								</div>
								<div class="clearfix"> </div>
							</div>
							<?php } ?>
				
						</div>
				</div>
			</div>
		</div>
	</div>
<!-- //team -->
</div>
<div class="clearfix"></div>
</div>
<script type="text/javascript">
$('ul li a').on('click', function(){
    $(this).parent().addClass('current').siblings().removeClass('current');
    var a=$(this).parent().val();

    $.ajax({
			url:"module/school_gallery/show_img.php",
			data:"id="+a,
			type:"post",
			success:function(e){
				$('#sli').html(e);
			}
		});
});
</script>

<!--tabs--><!-- for team -->
	<script src="include/js/easy-responsive-tabs.js"></script>
	<script>
	$(document).ready(function () {
	$('#horizontalTab').easyResponsiveTabs({
	type: 'default', //Types: default, vertical, accordion           
	width: 'auto', //auto or any width like 600px
	fit: true,   // 100% fit in a container
	closed: 'accordion', // Start closed if in accordion view
	activate: function(event) { // Callback function if tab is switched
	var $tab = $(this);
	var $info = $('#tabInfo');
	var $name = $('span', $info);
	$name.text($tab.text());
	$info.show();
	}
	});
	$('#verticalTab').easyResponsiveTabs({
	type: 'vertical',
	width: 'auto',
	fit: true
	});
	});
	</script>
<!--//tabs--><!-- //for team -->
