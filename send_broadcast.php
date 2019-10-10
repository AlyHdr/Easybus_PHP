<?php
    require_once("connect.php");
    $driverId=$_POST['driverId'];
    $morning=$_GET['morning'];
    $messageTo=$_POST['message'];
    echo $driverId." ".$messageTo;
    if(strcmp($morning,"true")==0)
        $query="select fcm_token from fcm_info,user,userAbsence where driverId=$driverId and morning=1 and user.userId=fcm_info.id and user.userId=userAbsence.userId";
    else
        $query="select fcm_token from fcm_info,user,userAbsence where driverId=$driverId and afternoon=1 and user.userId=fcm_info.id and user.userId=userAbsence.userId";
    if($res=mysqli_query($conn,$query))
    {
         $regTokens = array();
        while($row = mysqli_fetch_assoc($res)){
            array_push($regTokens,$row['fcm_token']);
        }
        echo sizeof($regTokens);
    }
    sendNotification($regTokens,$messageTo);
    
    function sendNotification($registrationIds, $message)
    {
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
 
}