<?php
$start_time = microtime(true);
require_once 'includes/core.php';
echo "<pre>";
print_r($funcion->getFacebookVideo('https://www.facebook.com/melinhconfessions/videos/325635128212892/'));
echo "</pre>";
echo(number_format(microtime(true) - $start_time, 2));
