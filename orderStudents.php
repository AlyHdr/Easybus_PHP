<?php
	require_once('connect.php');
	$driverPhone=$_GET['driverPhone'];
	$studentsIdsString=$_POST['studentsIds'];

	$studentsIds=explode(',',$studentsIdsString);
	$sizeOfArray=sizeof($studentsIds);

	$query="select driverId from driver where phoneNb='$driverPhone'";
	if($r=mysqli_query($conn,$query))
	{
		$row=mysqli_fetch_assoc($r);
		$driverId=$row['driverId'];
	}
	else
		echo mysqli_error($conn);
	for($i=0;$i<$sizeOfArray;$i++)
	{
	    $query1="delete from orderedTrack where userId=".$studentsIds[$i];
	    $id=(int)$studentsIds[$i];
	    $query2="insert into orderedTrack values($id)";
	    if(!mysqli_query($conn,$query1))
	        echo mysqli_error($conn);
	    if(!mysqli_query($conn,$query2))
	        echo mysqli_error($conn);
	}
	?>