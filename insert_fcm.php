<?php
	require_once("connect.php");
	$fcm_token=$_POST["fcm_token"];
	$id=$_POST["id"];
	$query="select * from fcm_info where id=$id";
	if($res=mysqli_query($conn,$query))
	{
	    if(mysqli_num_rows($res)==0)
	        $query="insert into fcm_info values($id,'$fcm_token')"; 
	   else
	        $query="update fcm_info set fcm_token='$fcm_token' where id=$id";
	}
	else
	    echo mysqli_error($conn);
	if(!mysqli_query($conn,$query))
		echo mysqli_error($conn);
	else
	    echo "OK</br>";
	?>
	