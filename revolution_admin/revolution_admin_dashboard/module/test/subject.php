
<?php

session_start();
ob_start(); 

//echo md5("9024555623");
$in=glob('../../include/php/*.php');
//print_r($in);
foreach($in as $file)
{
	require_once($file);
}
extract($_POST);
?>
    <option value="">Select Subject</option>
<?php


		$q="select id, name from subject where class_id=$classid";
		$ans=fetchAll($q);
		?>
		
		
		
            
            <?php
            foreach($ans as $ans)
		{
		?>
            <option value="<?php echo $ans['id'] ?>" <?php if(isset($_POST['subject'])){echo "selected";}?>><?php echo $ans['name'];?></option>
        <?php } ?>
            
            