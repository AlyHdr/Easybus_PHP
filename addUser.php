<?php
	require_once('connect.php');
	$fname=$_POST['fname'];
	$lname=$_POST['lname'];

	$query="insert into stream_cv_users values('$fname','$lname')";
	
	if(!mysqli_query($conn,$query))
		echo mysqli_error($conn);
	else
		echo "Ok";
	?>