<!-- scrolling script -->
<script type="text/javascript">
	jQuery(document).ready(function($) {
		$(".scroll").click(function(event){		
			event.preventDefault();
			$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
		});
	});
</script> 
<!-- //scrolling script -->
<!-- customer -->
	<div class="customer jarallax" id="customer" style="width:100px">
		<div class="agileinfo-dot">
		<div class="container">
			<h3>Customer Says</h3>
			<div class="customer-grids">
				<ul id="flexiselDemo1">	
				<?php	
					$message_data=fetchAll("select id,name,photo,designation,message,status from message where status='y'");
					foreach ($message_data as $message_data) 
					{
				?>
					<li>
						<div class="customer-grid">
							<p> <?php echo  $message_data['message'];?></p>
							<h4><?php echo $message_data['name'];?> <span><?php echo  $message_data['designation'];?></span></h4>
						</div>
						<div class="client-img">
							<img src=<?php echo SITE_IMAGES."message/$message_data[photo]";?> alt="" />
						</div>
					</li>
					<?php } ?>
					
				</ul>
				<script type="text/javascript">
							$(window).load(function() {
								$("#flexiselDemo1").flexisel({
									visibleItems: 3,
									animationSpeed: 1000,
									autoPlay: true,
									autoPlaySpeed: 3000,    		
									pauseOnHover: true,
									enableResponsiveBreakpoints: true,
									responsiveBreakpoints: { 
										portrait: { 
											changePoint:480,
											visibleItems: 1
										}, 
										landscape: { 
											changePoint:640,
											visibleItems:3
										},
										tablet: { 
											changePoint:768,
											visibleItems: 3
										}
									}
								});
								
							});
					</script>
					<script type="text/javascript" src="include/js/jquery.flexisel.js"></script>
			</div>
		</div>
	</div>
</div>
</div>
<!-- //customer -->