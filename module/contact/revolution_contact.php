<?php
    if(isset($_POST['name'])){
        // echo "hi";exit;
        addUpdate('contact',$_POST);
        $_SESSION['scontact']="Thank you to contact us";
        header("location:index.php?mod=contact&do=contact");
    }
?>
<div class="contact">
	<div class="contact-top">
		<h3>Contact Us</h3>
        <p><?php if(isset($_SESSION['scontact'])){echo $_SESSION['scontact']; unset($_SESSION['scontact']);}?></p>
	</div>
	<div class="contact-bottom">
	 <form method="post">
		<input type="text" name="name" value="Name" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Name';}"/>
		<input type="text" name="email" class="no-mar" value="Email" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Email';}"/>
		<input type="text" name="Mobile" value="Mobile" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Mobile';}"/>
		<input type="text" name="subject" class="no-mar" value="Subject" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Subject';}"/>
		<textarea name="message" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Message';}"/>Message</textarea>
		<input type="submit" value="Send" />
	</form>	
	</div>
	<div class="clearfix"> </div>
</div>
<div class="map">
<?php echo $icon_data['map'];?>
</div>
</div>
<!--contact end here-->
