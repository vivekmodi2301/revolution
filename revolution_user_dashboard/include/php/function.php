<?php
//insert into abc set 'name'='vivek','fname'='manohar'
//update abc set 'name'='vivek','fname'='manohar' where id=1
	$con=mysqli_connect(hostname,USERNAME,PASSWORD,DB);
	function addUpdate($table,$data,$id=""){
		$con=mysqli_connect(HOSTNAME,USERNAME,PASSWORD,DB);
		$qry="insert into $table set ";
		$wh="";
		if($id){
			$qry="update $table set ";
			$wh=" where id=$id";	
		}
		//ARRAY('name'=>'vivek','fname'=>'manohar')
		//print_r($data);
		foreach($data as $key=>$value){
			$qry.="$key='". addslashes($value)."' ,";
		}
		$qry=substr($qry,0,-1).$wh;
		//echo $qry;exit;
		mysqli_query($con,$qry);
		if(!$id){
			return mysqli_insert_id($con);
			//echo $qry;
		}
	}
	function fetchAll($sql)
	{
		$con=mysqli_connect(HOSTNAME,USERNAME,PASSWORD,DB);
	//echo $sql;exit;		
		$alldata=array();
		$rs=mysqli_query($con,$sql);
		//$dt=array();
		while(($dt=mysqli_fetch_assoc($rs))?$alldata[]=array_map('stripslashes',$dt):false);
		return $alldata;
		}
		function fetch($sql)
		{
		
			$con=mysqli_connect(HOSTNAME,USERNAME,PASSWORD,DB);
			$rs=mysqli_query($con,$sql);
			($dt=mysqli_fetch_assoc($rs))? $dt= array_map('stripslashes',$dt): $dt= false;
			//print_r($dt);exit;
		 	return $dt;
		}
		function totalRow($sql)
		{
			$con=mysqli_connect(HOSTNAME,USERNAME,PASSWORD,DB);
			$rs=mysqli_query($con,$sql);
			
		
		 	return mysqli_num_rows($rs);
		}

		function delete($table,$id)
		{
			$con=mysqli_connect(HOSTNAME,USERNAME,PASSWORD,DB);
			$sql="delete from $table where id=$id";
			mysqli_query($con,$sql);

			
			}
?>