<?php
session_start();
ob_start(); 
$in=glob('../../include/php/*.php');
foreach($in as $file)
{
	//echo $file;
	include_once($file);
}
$wh="";
if($_POST['roll'])
{
	$wh.=" and student.roll like '$_POST[roll]%'";
	}
?>
<table class="table table-striped table-hover table-bordered">
	<tr>
    	<td>Roll No./Date</td>
        <?php 
			for($i=1;$i<=31;$i++){
			?>
            	<td><?php echo $i;?></td>
            <?php 	
			}
		?>
    </tr>
    <?php
		$roll=array();
		$qry="select roll from student where class_id=$_POST[class] $wh";
		echo $qry;
		$roll_list=fetchAll($qry);
		foreach($roll_list as $roll_list)
		{
			$roll[]=$roll_list['roll'];	
		}
		//print_r($roll);
		foreach($roll as $roll){
		?>	
        	<tr>
				<td><?php echo $roll;?></td>
                <?php
					
				 for($i=1;$i<=31;$i++){
					 $att=fetch("select status from $_POST[month] where roll=$roll and datee=$i");
					 echo "select status from $_GET[month] where roll=$roll and datee=$i";
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
        <?php	
		}
	?>
    <tr>
    	<td></td>
    </tr>
</table>