<?php
$start_time = microtime(true);
require_once 'includes/core.php';
$video  = "291473471675536"; // ID cua VIDEO
$token  = "";  // access_token cua ban
$link   = file_get_contents("https://graph.facebook.com/".$video."/?fields=source&access_token=".$token); //lay thong tin graph
$graph  = json_decode($link, true); // decode json
echo "<pre>";
print_r($graph);
echo "</pre>";
echo(number_format(microtime(true) - $start_time, 2));