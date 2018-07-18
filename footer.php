
<!--footer start here-->
 <div class="footer" >
		<div class="footer-main">
			<div class="footer-top">
				<?php 
					$qry="select message as msg,name  from testimonial join student on testimonial.roll=student.roll where status='y' order by testimonial.id desc limit 0,3";
					$data=fetchAll($qry);
					foreach ($data as $msg) {
				?>
				<div class="col-md-4 footer-grid">
				<a href="#"><h3>@<?php echo $msg['name'];?></h3></a>
					<p><?php echo $msg['msg'];?></p>
				</div>
				<?php }?>
			  <div class="clearfix"> </div>
			</div>
			<div class="footer-bottom">
				<p>&copy;Design & devloped by Khushboo,Vivek</p>
			</div>
		</div>
	   </div>
	</div>
  </div>
<!--footer end here-->
</body>
</html>

