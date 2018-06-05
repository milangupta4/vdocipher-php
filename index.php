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
  $vdo_video_details = vdo_init();
  // Calls and receives OTP json object
  $vdo_otp_response = vdo_otp($vdo_video_details);
  // Uses returned OTP to create embed code
  $vdo_embed_code = vdo_play($vdo_otp_response);
  //Displays the embed code
  echo $vdo_embed_code;
?>
</body>
</html>
