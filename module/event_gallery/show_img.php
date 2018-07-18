
<!-- Default-JavaScript-File -->
<script type="text/javascript" src="../../include/js/jquery-2.1.4.min.js"></script>
<script type="text/javascript" src="../../include/js/bootstrap.js"></script>
<!-- //Default-JavaScript-File -->

<!-- Property for sale section css files-->
<link rel="stylesheet" href="../../include/css/owl.carousel.css" type="text/css" media="all">
<link href="../../include/css/owl.theme.css" rel="stylesheet">
<!-- //Property for sale section css files -->



<!-- Property for sale section Script-->
<script>
$(document).ready(function() { 
	$("#owl-demo").owlCarousel({
 
		autoPlay: 3000, //Set AutoPlay to 3 seconds
		autoPlay:true,
		items : 3,
		itemsDesktop : [640,5],
		itemsDesktopSmall : [414,4]
 
	});
	
}); 
</script>
<!-- //Property for sale section Script-->
<?php
		include_once("../../include/php/config.php");
		include_once("../../include/php/function.php");
		$event_gallery=fetchAll("select id,category_id,photo,status from event_gallery where category_id=$_POST[id] and status='y'");
?>
<div class="special" id="offers">
		<div class="container1">
			<div class="agileits-special-grids">
				<div id="owl-demo" class="owl-carousel owl-theme">
					<?php
						$i=1;
						foreach ($event_gallery as $event_gallery)
						{
							if($i==1)
							{
					?>
								<div class="item" style="padding-right:5px;">
					<?php
							}
					?>
								<a href="#" ><img src=<?php echo SITE_IMAGES."event_gallery/$event_gallery[photo]";?> alt="" width="260px" height="190px" style="padding-top:8px;" class="img-responsive"></a>

					<?php
							if($i<3)
							{
								$i++;
							}
							else
							{
								$i=1;
					?>
								</div>
					<?php
							}
						}
						if($i<3)
						{
					?>
							</div>
					<?php
						}
					?>
				</div>
			</div>
		</div>
</div>

<script src="../../include/js/owl.carousel.js"></script>
