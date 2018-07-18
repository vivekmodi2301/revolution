
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Revolution Admin</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
 <link rel="stylesheet" href="<?php echo ROOT;?>system/css/css/bootstrap.min.css">

  
  <script src="<?php echo ROOT;?>system/js/jquery.js"></script>
  <script src="<?php echo ROOT;?>system/css/js/bootstrap.min.js"></script>
  <script src="<?php echo ROOT;?>ckeditor/ckeditor.js"></script>
  <?php
    	$qry="select * from icon where id=1";
		$icon_data=fetch($qry);

?>
	<link rel="shortcut icon" href="<?php echo ROOT."system/logo_images/".$icon_data['small_logo']; ?>" />
</head>
<body>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="#">WebSiteName</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
    <?php
    /*
		if(isset($_SESSION['logindtl'])){
      */
	?>
  <?php if(isset($_SESSION['logindtl'])){?>
      <ul class="nav navbar-nav">
        <li><a href="index.php">Slider</a></li>
        <li><a href="index.php?mod=static_gallery&do=list">Static Images</a></li>

        <li><a href="index.php?mod=static_page&do=list">Static Page</a></li>
        <li class="dropdown ">
          <a class="dropdown-toggle " data-toggle="dropdown" href="#">Gallery<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="index.php?mod=gallery_category&do=school_list">School Photo Gallery Category</a></li>
            <li><a href="index.php?mod=gallery_school&do=school_gallery_list">School Photo Gallery List</a></li>
            <li><a href="index.php?mod=gallery_category&do=event_list">Event Photo Gallery Category</a></li>
            <li><a href="index.php?mod=gallery_event&do=event_gallery_list">Event Photo Gallery List</a></li>
          </ul>
        </li>
        <li><a href="index.php?mod=testimonial&do=">Testimonial</a></li>
        <li><a href="index.php?mod=faculty&do=">Faculty</a></li>
        <li><a href="index.php?mod=contact&do=">Contact</a></li>
        <li><a href="index.php?mod=message&do=">Message</a></li>
        <li><a href="index.php?mod=page&do=page_priority">Pages</a></li>
        <li><a href="index.php?mod=icon&do=list">Icons</a></li>
        <li><a href="index.php?mod=starstu&do=list">Star student</a></li>
        <li><a href="revolution_admin_dashboard/index.php">Dashboard</a></li>
        <!--<li><a href="index.php?mod=class_subject&do=addedit">Class</a></li>-->
      </ul>
      <?php
      
		}
    
		?>
      <ul class="nav navbar-nav navbar-right">
        <li><?php if(isset($_SESSION['logindtl'])){?><a href="index.php?mod=login&do=logout">Logout</a><?php } else{?><a href="index.php?mod=login&do=login">Login</a><?php }?>
      </ul>
    </div>
  </div>
</nav>