<?php
	require_once('connect.php');
	$userId=$_GET['userId'];
	$query="select driverId from follow where userId=$userId ";
	if(!$res=mysqli_query($conn,$query))
		echo mysqli_error($conn);
	else
	{
	    if(mysqli_num_rows($res)==0)
	        echo "empty";
		while($row=mysqli_fetch_array($res))
		{
			$driverId=$row[0];
			$query="select * from driver,tracktype where driver.driverId=$driverId and tracktype.driverId=driver.driverId";
			if($res2=mysqli_query($conn,$query))
			{
				$row2=mysqli_fetch_assoc($res2);
				echo $row2["fullName"]." ".$row2["phoneNb"]." ".$row2["houseLat"]." ".$row2["houseLng"]." ".$row2["type"]." ".$row2["driverId"]." ";
			}
			else
			    echo mysqli_error($conn);
			echo "<br/>";
		}
		
	}
	?>