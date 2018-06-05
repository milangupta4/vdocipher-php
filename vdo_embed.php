<?php

function vdo_embed($video_id){
  // Edit the client key here
  $client_key = 'a1b2c3d4e5f6';
  $ttl = 300;
  $annotate_code = <<< WATERMARK
      [{'type':'rtext', 'text':'username', 'alpha':'0.60', 'color':'0xFF0000', 'size':'15', 'interval':'5000'}]
WATERMARK;
  // Refer to the blog https://www.vdocipher.com/blog/2014/12/add-text-to-videos-with-watermark/ for more details
  // on writing annotation code for watermark
  $otp_post_array = array(
    "ttl" => $ttl,
    "annotate" => $annotate_code
  );
  $header = array(
      'Authorization: Apisecret ' . $client_key,
      'Content-Type: application/json',
      'Accept: application/json'
  );
  $otp_post_json = json_encode($otp_post_array);
  $url = "https://dev.vdocipher.com/api/videos/$video_id/otp";
  $curl = curl_init();
  curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
  curl_setopt($curl, CURLOPT_POST, true);
  curl_setopt($curl, CURLOPT_POSTFIELDS, $otp_post_json);
  curl_setopt($curl, CURLOPT_HTTPHEADER, $header);
  curl_setopt($curl, CURLOPT_URL, $url);
  $otp_response = curl_exec($curl);
  curl_close($curl);
  $otp_response = json_decode($otp_response);
  $OTP = $otp_response->otp;
  $playbackInfo = $otp_response->playbackInfo;
$heredoc = <<< EOF
    <div id="vdo$OTP" style="width: 1280px; max-width:100%; height:auto;"></div>
    <script>
      (function(v,i,d,e,o){v[o]=v[o]||{}; v[o].add = v[o].add || function V(a){
      (v[o].d=v[o].d||[]).push(a); };if(!v[o].l) { v[o].l=1*new Date();
      a=i.createElement(d), m=i.getElementsByTagName(d)[0]; a.async=1; a.src=e;
      m.parentNode.insertBefore(a,m); }})(window,document,"script",
      "https://cdn-gce.vdocipher.com/playerAssets/1.6.4/vdo.js","vdo");
      vdo.add({
        otp: "$OTP",
        playbackInfo: "$playbackInfo",
        theme: "9ae8bbe8dd964ddc9bdb932cca1cb59a",
        container: document.querySelector( "#vdo$OTP"  ),
      });
    </script>
EOF;
    return $heredoc;
}
?>
