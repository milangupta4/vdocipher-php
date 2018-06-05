<?php
// Function called to get OTP, starts
function vdo_otp($video_details) {
    $url = "https://dev.vdocipher.com/api/videos/$video_id/otp";
    $video_id = $video_details["video_id"];
    $client_key = $video_details["client_key"];
    $otp_post_array = $video_details["otp_post_array"];
    $header = array(
        'Authorization: Apisecret ' . $client_key,
        'Content-Type: application/json',
        'Accept: application/json'
    );
    $otp_post_json = json_encode($otp_post_array);
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($curl, CURLOPT_POST, true);
    curl_setopt($curl, CURLOPT_POSTFIELDS, $otp_post_json);
    curl_setopt($curl, CURLOPT_HTTPHEADER, $header);
    curl_setopt($curl, CURLOPT_URL, $url);
    $otp_response = curl_exec($curl);
    curl_close($curl);
    return $otp_response;
}
// Function called to get OTP, ends

?>
