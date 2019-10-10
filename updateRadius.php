<?php
	require_once("connect.php");
	$id=$_POST['userId'];
	$radius=$_POST['radius'];
	$query="update location set radius=$radius where id=$id";
	if(!mysqli_query($conn,$query))
		echo mysqli_error($conn);
	else
	    echo "ok";
	?>