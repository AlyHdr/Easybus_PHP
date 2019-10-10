<?php
	require_once('connect.php');
	$driverPhone=$_GET['driverPhone'];
	$query="select driverId from driver where phoneNb='$driverPhone'";
	if($r=mysqli_query($conn,$query))
	{
		$row=mysqli_fetch_assoc($r);
		$id=$row['driverId'];
	}
	$query="select orderedTrack.userId,fName,lName,longtitude,latitude,phoneNumber,morning,afternoon,radius from orderedTrack,location,user,userAbsence where orderedTrack.userId=user.userId and user.userId=location.id and user.userId=userAbsence.userId and orderedTrack.userId in (select userId from user,driver where user.driverId=driver.driverId and driver.phoneNb=$driverPhone) ";
	if($r=mysqli_query($conn,$query))
	{
	    while($row=mysqli_fetch_assoc($r))
	        {
	            echo $row['fName']." ".$row['lName']." ".$row["latitude"]." ".$row["longtitude"]." ".$row["phoneNumber"]." ".$row['userId']." ".$row['morning']." ".$row['afternoon']." ".$row['radius']."<br/>";
	        }
	}
	else
	    echo mysqli_error($conn)
	?>