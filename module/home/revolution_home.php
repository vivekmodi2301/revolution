

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

  		<img src=<?php echo SITE_IMAGES."message/$message_data[photo]";?> height="100px" width="100%">
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
	                     <h3>Our Star Students</h3>
			       </div>
			      <ul class="rslides" id="slider4">
			        <li>
			        <?php
			        	$star_student=fetchAll("select id,name,photo from starstudent");
			        	foreach ($star_student as $value) {
			        ?>
			          <div class="molli-grids">
						<img src="<?php echo SITE_IMAGES."stu_images/".$value['photo'];?>" />
						<div class="molli-text">
							<h4><?php echo $value['name'];?> </h4>
						</div>
					  </div>
					  <?php }?>
					  
			        </li>
			      </ul>
			  </div>
			    <div class="clearfix"> </div>
	</div>
	<div class="clearfix"> </div>
<!--molli end here-->
 
</div>

<script type="text/javascript">
var slideIndex = 1;
showDivs(slideIndex);

function plusDivs(n) {
  showDivs(slideIndex += n);
}

function showDivs(n) {
  var i;
  var x = document.getElementsByClassName("mySlides");
  if (n > x.length) {slideIndex = 1}    
  if (n < 1) {slideIndex = x.length}
  for (i = 0; i < x.length; i++) {
     x[i].style.display = "none";  
  }
  x[slideIndex-1].style.display = "block";  
}
</script>