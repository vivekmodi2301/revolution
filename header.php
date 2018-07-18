
<!DOCTYPE HTML>
<html>
<head>
<title>Revolution</title>

<?php
		$qry="select * from icon where id=1";
		$icon_data=fetchOne($qry);

	$cssfiles=glob("include/css/*.css");
	foreach ($cssfiles as $cssfile) {?>
		<link href="<?php echo ROOT.$cssfile;?>" rel="stylesheet" type="text/css" media="all">
	<?php
}
?>

<?php
	$jsfiles=glob("include/js/*.js");
	foreach ($jsfiles as $jsfile) {?>
		<script src="<?php echo ROOT.$jsfile;?>"></script>
	<?php
}
?>
<!-- Custom Theme files -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); }>
</script>
<link href='//fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
	<script type="text/javascript">
			jQuery(document).ready(function($) {
				$(".scroll").click(function(event){		
					event.preventDefault();
					$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
				});
			});
	</script>
	
	<link rel="shortcut icon" href="<?php echo SITE_IMAGES."logo_images/".$icon_data['small_logo']; ?>" />
<!-- //end-smoth-scrolling -->
</head>
<body>
<!--top nav start here-->
<div class="mother-grid">
	<div class="container">
	  <div class="temp-padd">
		<div class="top-strip">
			<div class="address">
				<ul>
				<li><a href="mailto:<?php echo $icon_data['email'];?>"><span class="mes"> </span><?php echo $icon_data['email'];?></a></li>
					<li><span class="ph"> </span><?php echo $icon_data['contact'];?></li>
				</ul>
			</div>
			<div class="social-icons">
				<ul>
					<li><a href="<?php echo $icon_data['facebook'];?>"> <span class="w-f"> </span></a></li>
                   <li><a href="<?php echo $icon_data['twitter'];?>""> <span class="w-tw"> </span></a></li>
				</ul>
			</div>
		  <div class="clearfix"> </div>
   </div>
<!--top nav end here-->	
<!--title start here-->
<div class="title-main">
			<img src="<?php echo SITE_IMAGES."logo_images/".$icon_data['logo']; ?>" height="100px" style="width:100px">
		
</div>
<!--title end here-->
<!--header start here-->
<div class="header">
			<div class="navg">
				<span class="menu"> <img src="<?php echo IMAGES;?>images/icon.png" alt=""/></span>
				<ul class="res">
					<?php
						$page_data=fetchAll("select id,name,page_id,priority from pages_priority where priority!=0 order by priority");
						// print_r($page_data);exit;
						foreach ($page_data as $page_data) {
							switch ($page_data['page_id']) {
								case 'home':
								?>
								
									<li><a <?php if(!isset($_GET['mod'])){?> class="active" <?php }?> href="index.php">Home</a></li>
								<?php 
									break;
								case 'contact':
								?>
									<li><a <?php if(isset($_GET['mod']) && $_GET['mod']=='contact'){?> class="active" <?php }?> href="index.php?mod=contact&do=contact">Contact</a></li>
								<?php 
									break;
								case 'eventGallery':
								?>
								
									<li><a <?php if(isset($_GET['mod']) && $_GET['mod']=='event_gallery'){?> class="active" <?php }?> href="index.php?mod=event_gallery&do=event">Event Gallery</a></li>
					
					
								<?php 
									break;
								case 'testimonial':
								?>
								<li><a <?php if(isset($_GET['mod']) && $_GET['mod']=='testimonial'){?> class="active" <?php }?> href="index.php?mod=testimonial&do=testimonial">Testimonial</a></li>
					
					
								<?php 
									break;
								case 'schoolGallery':
								?>
								
									<li><a <?php if(isset($_GET['mod']) && $_GET['mod']=='school_gallery'){?> class="active" <?php }?> href="index.php?mod=school_gallery&do=school">School Gallery</a></li>
								<?php 
									break;
								case 'login':
								?>
								
									<li><a href="revolution_user_dashboard/">Login</a></li>
								<?php 
									break;
								default:
									$page_name=fetchOne("select page_name from static_page where id=$page_data[page_id]");
										?>
										<li><a href="index.php?mod=static&do=static&id=<?php echo $page_data['page_id'];?>"><?php echo $page_name['page_name'];?></a></li>
										<?php 
									break;
							}
							?>

							<?php 
						}
					?>					
				</ul>
				<script>
                  $( "span.menu").click(function() {
                    $(  "ul.res" ).slideToggle("slow", function() {
                     // Animation complete.
                     });
                     });
		       </script>
			</div>
			<div class="clearfix"> </div>
  </div>
<!--header end here-->