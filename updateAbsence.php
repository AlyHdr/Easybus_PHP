<?php
	require_once('connect.php');
	$userId=$_POST['userId'];
	$morning=$_POST['morning'];
	$afternoon=$_POST['afternoon'];
	
	/*$query="select morning,afternoon from userAbsence where userId=$userId";
	
	if($r=mysqli_query($conn,$query))
	{
		$row=mysqli_fetch_array($r);
		$morning=$row[0];
		$afternoon=$row[1];
	}
	if($morning==0)
		$morning=1;
	else
		$morning =0;
	if($afternoon==0)
		$afternoon=1;
	else
		$afternoon=0;*/
	$query="update userAbsence set morning=$morning,afternoon=$afternoon where userId=$userId";
	
	if(!mysqli_query($conn,$query))
		echo mysqli_error($conn);
	else
		echo "Ok";
	?>