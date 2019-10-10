<?php
	require_once('connect.php');
	$driverPhone=$_GET['driverPhone'];
	$query="select driverId from driver where phoneNb='$driverPhone'";
	if($r=mysqli_query($conn,$query))
	{
		$row=mysqli_fetch_assoc($r);
		$id=$row['driverId'];
	}
	$query="select userId from orderedTrack where userId in (select userId from user,driver where user.driverId=driver.driverId and driver.phoneNb=$driverPhone and coming=1) ";
	if($r=mysqli_query($conn,$query))
	{
	    while($row=mysqli_fetch_assoc($r))
	        {
	            //echo $row['latitude'].",".$row['longtitude']."</br>";
	            echo $row['userId']." ";
	        }
	}
	else
	    echo mysqli_error($conn)
	?>