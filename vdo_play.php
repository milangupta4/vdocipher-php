<?php

function vdo_play($otp_response) {
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
