<?php

function vdo_init() {
    $client_key = 'a1b2c3d4e5f6';
    $video_id = '1234567890';
    // We recommend setting time-to-live for OTP validity to 300s.
    $ttl = 300;

    //    Using PHP heredocs to enter watermark and IP-geo information.
    // Heredocs are a convenient way to create multiline strings, useful for long strings of code.

    // Watermark, URL Whitelisting and IP-Geo restrictions are optional.
    $annotate_code = <<< WATERMARK
    [{'type':'rtext', 'text':' {name}', 'alpha':'0.60', 'color':'0xFF0000', 'size':'15', 'interval':'5000'}]
WATERMARK;

    // Please check VdoCipher server API reference for more details
    // https://dev.vdocipher.com/api/docs/book/playbackauth/whitelist.html
    $whitelist_href = "example.com";

    // https://dev.vdocipher.com/api/docs/book/playbackauth/ipgeo.html
    $ip_geo_rules = <<< IPGEO
    [
      {
        "action": "false",
        "ipSet": [],
        "countrySet": []
      },
      {
        "action": "true",
        "ipSet": [],
        "countrySet": ["IN", "GB"]
      }
    ]
IPGEO;

    // OTP details such as time for OTP validity, annotation code, URL whitelisting and IP-Geo restrictions must be sent as part of $otp_post_array
    $otp_post_array = array(
      "ttl" => $ttl,
      "annotate" => $annotate_code,
      "whitelisthref"=> $whitelist_href,
      "ipGeoRules"=> $ip_geo_rules
    );
    $video_details = array(
      "client_key" => $client_key,
      "video_id" => $video_id,
      "otp_post_array" => $otp_post_array
    );
    return $video_details;
}
?>
