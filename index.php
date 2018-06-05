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
  // Initializes client key, video ID and OTP details such as annotation code and URL, IP-geo restrictionss
  $video_details = vdo_init();
  // Calls and receives OTP json object
  $otp_response = vdo_otp($video_details);
  // Uses returned OTP to create embed code
  $embed_code = vdo_play($otp_response);
  //Displays the embed code
  echo $embed_code;
?>
</body>
</html>
