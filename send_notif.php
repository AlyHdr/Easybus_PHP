<?php
	require "connect.php";
	$message=$_POST['message'];
	$title=$_POST['title'];
	$id=$_POST['id'];
	$path_to_fcm = 'https://fcm.googleapis.com/fcm/send';
	$server_key="AAAA8e-afjg:APA91bFvlpw9OwRrgWKCPAnLd9Q8_SQ6zQC8MNpCh1aNGHrCL_gaJXxVuLmyNm83nn2EFqDEFZS6PV_fr5VXqfvK3UdOaj89uMbzIswoxGAEznxFK6cxZFctse7Y_TFq22uzzEnM4ADH";
	$sql="select fcm_token from fcm_info where id=$id";
	if(!$result=mysqli_query($conn,$sql))
	    echo mysqli_error($conn);
	
	$row=mysqli_fetch_row($result);
	$key=$row[0];
	$registrationIds=array($key);
	$msg = array
    (
        'message' => $message,
        'title' => 'Android Push Notification using Google Cloud Messaging',
        'subtitle' => 'www.simplifiedcoding.net',
        'tickerText' => 'Ticker text here...Ticker text here...Ticker text here',
        'vibrate' => 1,
        'sound' => 1,
        'largeIcon' => 'large_icon',
        'smallIcon' => 'small_icon'
    );
 
    $fields = array
    (
        'registration_ids' => $registrationIds,
        'data' => $msg
    );
    $server_key="AAAA8e-afjg:APA91bFvlpw9OwRrgWKCPAnLd9Q8_SQ6zQC8MNpCh1aNGHrCL_gaJXxVuLmyNm83nn2EFqDEFZS6PV_fr5VXqfvK3UdOaj89uMbzIswoxGAEznxFK6cxZFctse7Y_TFq22uzzEnM4ADH";

    $headers = array
    (
        'Authorization: key='.$server_key,
        'Content-Type: application/json'
    );
 
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, 'https://android.googleapis.com/gcm/send');
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
    $result = curl_exec($ch);
    curl_close($ch);
    ?>
	
