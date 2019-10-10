<?php
	require_once("connect.php");
	$id=$_POST['userId'];
	$lat=$_POST['lat'];
	$lng=$_POST['lng'];
	$query="update location set latitude=$lat,longtitude=$lng where id=$id";
	if(!mysqli_query($conn,$query))
		echo mysqli_error($conn);
	else
	    echo "ok";
	?>
	