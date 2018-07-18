<table class="table">
<tr>
	<th colspan="32" style="text-align:center; font-size:20px;">Search student by roll no.</th> 
	</tr>
	<tr>
    	<td colspan="32">
        <div class="col-lg-2 col-lg-offset-4 col-md-6 col-sm-6 col-xs-6  form-group input-group">
							<span class="input-group-addon">
            <i class="glyphicon glyphicon-search">
            </i> 
          </span>
           <input type="text" class="form-control" placeholder="search here ...."  onKeyUp="serch(this.value,'<?php echo $_GET['month'];?>','<?php echo $_GET['class'];?>')"></div></td>
    </tr>
    
</table>
<div id="show" class="table-responsive">
<table class="table table-striped table-hover table-bordered">
	<tr>
		<td>Month/Date</td>
        <?php 
			for($i=1;$i<=31;$i++){
			?>
            	<td><?php echo $i;?></td>
            <?php 	
			}
		?>
    </tr>
    <?php
		
		?>	
        	<tr>
				<td><?php echo $roll;?></td>
                <?php
					
				 for($i=1;$i<=31;$i++){
					 $att=fetch("select status from jan where roll=$roll and datee=$i");
					 //echo "select status from $_GET[month] where roll=$roll and datee=$i";
					 if($att){
						 if($att['status']=='a')
						 {
				?>
                
                	<td style="color:#C00"><?php echo $att['status']?></td>
                <?php	 }
				if($att['status']=='p')
						 {
				?>
                
                	<td style="color:#000"><?php echo $att['status']?></td>
                <?php 	 }
					
							 }
						else{
						?>
                        <td style="color:#CCC";><?php echo "N/A";?></td>
                        <?php  
							}
				}
				?>
            </tr>
</table></div>
<script>
 function serch(roll,month,myclass)
	{
		$.ajax({
			url:"module/attendance/slist.php",
			data:"roll="+roll+"&month="+month+"&class="+myclass,
			type:'POST',
			success: function(rs){
				
				$('#show').html(rs)
				}
			});
		}
</script>