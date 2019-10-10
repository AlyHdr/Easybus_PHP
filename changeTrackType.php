<?php
	require_once('connect.php');
	$trackType=$_GET['trackType'];
	$driverPhone=$_GET['driverPhone'];
	$query1="select driverId from driver where phoneNb='$driverPhone'";
	if(!($r1=mysqli_query($conn,$query1)))
		echo mysqli_error($conn);
	else
	{
	    if(mysqli_num_rows($r1)>0)
	        {
	            $row=mysqli_fetch_assoc($r1);
	            $driverId=$row['driverId'];
	        }
	    $query="update tracktype set type='$trackType' where driverId='$driverId'";
	    if(!($r2=mysqli_query($conn,$query)))
		    echo mysqli_error($conn);
	}
	?>