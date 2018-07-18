<div class="sidebar-menu ">
	<header class="logo1">
		<a href="#" class="sidebar-icon"> <span class="fa fa-bars"></span> </a>
	</header>
	<div style="border-top:1px ridge rgba(255, 255, 255, 0.15)"></div>
    <div class="menu">
		<ul id="menu" >
			<?php 
			if(isset($_SESSION['ulogindtl']))
			{
			?>
				<li>
					<a href="index.php"><i class="fa fa-tachometer"></i> <span>Home</span></a>
				</li>
				<li  id="menu-academico" style="min-height:50px;" >
					<a href="index.php?mod=test&do=list"><i class="fa fa-table" style="float:left"></i> <span style="float:left"> Test Results</span> </a>
				</li>
				<li  id="menu-academico" style="min-height:50px;" >
					<a href="index.php?mod=testimonial&do=addedit"><i class="fa fa-table" style="float:left"></i> <span style="float:left"> Testimonial</span> </a>
				</li>
				<li>
					<a href="index.php?mod=login&do=change_pass"><i class="fa fa-tachometer"></i> <span>Change Password</span></a>
				</li>
			<?php
			}
			?>
			<li><?php if(isset($_SESSION['ulogindtl'])){?><a href="index.php?mod=login&do=logout">Logout</a><?php } ?>
	  	</ul>
	</div>
</div>
<div class="clearfix"></div>

