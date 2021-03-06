<?php

$token = "token_api_oauth";

function sms_send($params, $token, $message)
{

    static $content;
    
    $params = array(
        'to'            => '4412334445566',         //destination number
        'from'          => 'Test',                  //sendername 
        'message'       => 'content of message',    //message content
        'format'        => 'json',
    );
    
    $url = 'https://api.smsapi.se/sms.do';

    $c = curl_init();
    curl_setopt($c, CURLOPT_URL, $url);
    curl_setopt($c, CURLOPT_POST, true);
    curl_setopt($c, CURLOPT_POSTFIELDS, $params);
    curl_setopt($c, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($c, CURLOPT_HTTPHEADER, array(
        "Authorization: Bearer $token"
    ));

    $content = curl_exec($c);
    $http_status = curl_getinfo($c, CURLINFO_HTTP_CODE);

    if ($http_status != 200) {
        sms_send($params, $token);
    }

    curl_close($c);
    return $content;
}
?>
