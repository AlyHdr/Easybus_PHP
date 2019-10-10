<?php
	require_once('connect.php');
	$phone=$_GET['phoneNb'];
	$query="select * from driver,school where phoneNb='$phone'";
	if(!($r=mysqli_query($conn,$query)))
		echo mysqli_error($conn);
	else
	{
	    if(mysqli_num_rows($r)>0)
	        {
	            $row=mysqli_fetch_assoc($r);
	            echo "Driver ".$row['driverId']." ".$row['fullName']." ".$row['phoneNb']." ".$row['houseLat']." ".$row['houseLng']." ".$row['latitude']." ".$row['longitude'];
	        }
	   else
	       {
	           $query="select * from user,location where phoneNumber='$phone' and location.id=user.userId";
	           
	           if($r=mysqli_query($conn,$query))
	           {
	               if(mysqli_num_rows($r)==0)
	                    echo "not found";
	               else
	               {
	                $row=mysqli_fetch_assoc($r);
	                echo $row['userId']." ".$row['fName']." ".$row['lName']." ".$row['phoneNumber']." ".$row['latitude']." ".$row['longtitude'];
	               }
	           }
	           else
	                echo mysqli_error($conn);
	       }
	}
	?>