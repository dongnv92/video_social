<?php
/**
 * Created by PhpStorm.
 * User: DONG
 * Date: 19/09/2018
 * Time: 15:35
 * {} []

 */
require_once 'includes/core.php';

$html = file_get_html('http://vt.tiktok.com/9KNbP/');
$html = $html->find('script' , 7);
preg_match_all('/video_id=(.+?)line=0/' , $html , $math);
$html = str_replace('\u0026' , '' , $math[1][0]);
$html = 'https://api.tiktokv.com/aweme/v1/playwm/?video_id='. $html .'&line=0';

function tiktok_get_redirect_final_target($url){
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_NOBODY, 1);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt($ch, CURLOPT_AUTOREFERER, 1);
    curl_exec($ch);
    $target = curl_getinfo($ch, CURLINFO_EFFECTIVE_URL);
    curl_close($ch);
    if ($target)
        return $target;
    return false;
}

echo tiktok_get_redirect_final_target($html);
