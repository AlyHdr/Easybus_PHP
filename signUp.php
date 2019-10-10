<?php
	require_once('connect.php');
	$fname=$_POST['fName'];
	$lname=$_POST['lName'];
	$phone=$_POST['phoneNb'];
	$longtitude=$_POST['longtitude'];
	$latitude=$_POST['latitude'];
	$type=$_POST['user_type'];
	if($type=='D')
	{
		$name=$fname." ".$lname;
		$query="insert into driver values(NULL,'$name','$phone','$longtitude','$latitude')";
		if(!mysqli_query($conn,$query))
			echo mysqli_error($conn);

	}
	else
	{
			$query="insert into user values(NULL,'$fname','$lname','$phone')";
			if(!mysqli_query($conn,$query))
				echo mysqli_error($conn);
								
			$query1="select userId from user where phoneNumber='$phone'";
									
			if(!$res=mysqli_query($conn,$query1))
				echo mysqli_error($conn);
				else
				{
					$row=mysqli_fetch_array($res);
					$userId=$row[0];
				}
			$query2="insert into location values($userId,$latitude,$longtitude,500)";                    
			if(!$res=mysqli_query($conn,$query2))
				echo mysqli_error($conn);
	}
	?>