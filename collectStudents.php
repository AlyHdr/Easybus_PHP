<?php
	require_once('connect.php');
	$driverPhone=$_GET['driverPhone'];
	$query="select driverId from driver where phoneNb='$driverPhone'";
	if($r=mysqli_query($conn,$query))
	{
		$row=mysqli_fetch_assoc($r);
		$id=$row['driverId'];
	}
	else
		echo mysqli_error($conn);
	$query="select user.userId,fName,lName,longtitude,latitude,phoneNumber,radius from user,location where driverId=$id and user.userId=location.id";
	if($r=mysqli_query($conn,$query))
	{
		if(mysqli_num_rows($r)>0)
		{
			while($row=mysqli_fetch_assoc($r))
				echo $row['fName']." ".$row['lName']." ".$row["latitude"]." ".$row["longtitude"]." ".$row["phoneNumber"]." ".$row['userId']." ".$row['radius'].
				"<br/>";
		}
		
	}
	else
		echo mysqli_error($conn);
	?>