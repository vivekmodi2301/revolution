

<div class="w3-content w3-display-container">
	<?php
	$slider_data=fetchAll("select photo from slider where status='y'");
	foreach ($slider_data as  $slider_data) {
		?>
			<img class="mySlides" src=<?php echo SITE_IMAGES."slider/$slider_data[photo]";?> style="width:100%" height="300px">
		<?php
	}
	?>
 

  <button class="w3-button w3-black w3-display-left" onclick="plusDivs(-1)">&#10094;</button>
  <button class="w3-button w3-black w3-display-right" onclick="plusDivs(1)">&#10095;</button>
</div>
<!--banner end here-->
<!--nunc dig start here-->
  <div class="nuncdig">
		<div class="nuncdig-main">

			<div class="nunc-top">

				<h3>Messages</h3>
			</div>
			<div class="nunc-bott">
				<?php
					$message_data=fetchAll("select id,name,photo,designation,message from message where status='y'");
					foreach ($message_data as $message_data) {?>
						<div class="col-md-4 ">

  		<img src=<?php echo SITE_IMAGES."message/$message_data[photo]";?> height="100px" width="100%" style="border-radius:50%">
					<div class="headind-text">
						<h3><?php echo $message_data['name'];?></h3>
						<h4><?php echo $message_data['designation'];?></h4>
					</div>
					<p><?php echo $message_data['message'];?></p>
				    
				</div>




						<?php
					}
				?>
				<div class="clearfix"> </div>
			</div>
		</div>
</div>
<!--nunc dig end here-->
<!--molli start here-->
			 <script>
			    // You can also use "$(window).load(function() {"
			    $(function () {
			      // Slideshow 4
			      $("#slider4").responsiveSlides({
			        auto: true,
			        pager: true,
			        nav: true,
			        speed: 500,
			        namespace: "callbacks",
			        before: function () {
			          $('.events').append("<li>before event fired.</li>");
			        },
			        after: function () {
			          $('.events').append("<li>after event fired.</li>");
			        }
			      });
			
			    });
			  </script>
<!----//End-slider-script---->
<!-- Slideshow 4 -->
			    <div  id="top" class="callbacks_container">
			    <div class="molli">
			    	<div class="molli-top">
			    		<span class="line-x"> </span>
			    		<span class="line-y"> </span>
	                     <h3>MORBI INTERDUM MOLLIS</h3>
	                     <P>Vestibulum auctor dapibus nequ</P>
			       </div>
			      <ul class="rslides" id="slider4">
			        <li>
			          <div class="molli-grids">
						<img src="<?php echo IMAGES;?>images/gd1.jpg" alt=""/>
						<div class="molli-text">
							<h4>Tante etvuputa</h4>
						</div>
					  </div>
					  <div class="molli-grids">
						<img src="<?php echo IMAGES;?>images/gd2.jpg" alt=""/>
						<div class="molli-text">
							<h4>Phasellus pede</h4>
						</div>
					</div>
					<div class="molli-grids">
						<img src="<?php echo IMAGES;?>images/gd3.jpg" alt=""/>
						<div class="molli-text">
							<h4>Morbi interdum</h4>
						</div>
					</div>
					<div class="molli-grids">
						<img src="<?php echo IMAGES;?>images/gd4.jpg" alt=""/>
						<div class="molli-text">
							<h4>Suspendisse mauris</h4>
						</div>
					</div>
			        </li>
			        <li>
					  <div class="molli-grids">
						<img src="<?php echo IMAGES;?>images/gd2.jpg" alt=""/>
						<div class="molli-text">
							<h4>Phasellus pede</h4>
						</div>
					</div>
					<div class="molli-grids">
						<img src="<?php echo IMAGES;?>images/gd3.jpg" alt=""/>
						<div class="molli-text">
							<h4>Morbi interdum</h4>
						</div>
					</div>
					<div class="molli-grids">
						<img src="<?php echo IMAGES;?>images/gd4.jpg" alt=""/>
						<div class="molli-text">
							<h4>Suspendisse mauris</h4>
						</div>
					</div>
					 <div class="molli-grids">
						<img src="<?php echo IMAGES;?>images/gd1.jpg" alt=""/>
						<div class="molli-text">
							<h4>Tante etvuputa</h4>
						</div>
					  </div>
			        </li>
			        <li>
					<div class="molli-grids">
						<img src="<?php echo IMAGES;?>images/gd3.jpg" alt=""/>
						<div class="molli-text">
							<h4>Morbi interdum</h4>
						</div>
					</div>
					<div class="molli-grids">
						<img src="<?php echo IMAGES;?>images/gd4.jpg" alt=""/>
						<div class="molli-text">
							<h4>Suspendisse mauris</h4>
						</div>
					</div>
					 <div class="molli-grids">
						<img src="<?php echo IMAGES;?>images/gd1.jpg" alt=""/>
						<div class="molli-text">
							<h4>Tante etvuputa</h4>
						</div>
					  </div>
					  <div class="molli-grids">
						<img src="<?php echo IMAGES;?>images/gd2.jpg" alt=""/>
						<div class="molli-text">
							<h4>Phasellus pede</h4>
						</div>
					</div>
			        </li>
			      </ul>
			  </div>
			    <div class="clearfix"> </div>
	</div>
	<div class="clearfix"> </div>
<!--molli end here-->
</div>