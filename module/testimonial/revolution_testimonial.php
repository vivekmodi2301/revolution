<!--information-grid start here-->
<div class="info-grid">
	<div class="info-grid-main">
		<div class="col-md-12 info-grid-left">
			<?php
				$testimonial_data=fetchAll("select name,message,photo from testimonial join student on testimonial.roll=student.roll  where status='y'");
				$i=1;
				// print_r($testimonial_data);exit;
				foreach ($testimonial_data as $testimonial_data) 
				{
					if($i==1)
					{
						$i++;
			?>
			<div class="col-lg-6 col-md-6 col-m-12 col-xs-12" style="border-bottom: 2px solid #e45c5f; padding:35px 0; marging-right:1px;">
			<?php
					}
					else if($i==2)
					{
						$i=1;
			?>
			<div class=" col-lg-6 col-md-6 col-sm- col-xs-12" style="border-bottom: 2px solid #e45c5f; padding:35px 0">
			<?php
					}
			?>

				<div class=" col-lg-6 col-md-6 col-sm-6 col-xs-12" >
					<img src=<?php echo DASHBOARD_SITE_IMAGES."student/$testimonial_data[photo]";?>>
				</div>
				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<p><?php echo $testimonial_data['message']?> </p>
					<div class="info-bwn">
				  		<h3>--<?php echo "$testimonial_data[name]";?>--</h3>
					</div>
				</div>
				<div class="clearfix"> </div>
			</div>
			<?php
				}
			?>

			
		</div>
	
		<div class="clearfix"> </div>
	</div>
</div>
</div>


