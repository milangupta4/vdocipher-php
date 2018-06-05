<!DOCTYPE html>
<html>
<head>
  <title>Sample VdoCipher PHP code</title>
</head>
<body>
<?php

  include('./vdo_init.php');
  include('./vdo_play.php');
  include('./vdo_otp.php');
  $video_details = vdo_init();  // Initializes client key, video ID and OTP details such as annotation code and URL, IP-geo restrictions
  $otp_response = vdo_otp($video_details);  // Calls and receives OTP json object
  $embed_code = vdo_play($otp_response);  // Uses returned OTP to create embed code
  echo $embed_code; //Displays the embed code
?>
</body>
</html>
