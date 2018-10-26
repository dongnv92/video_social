<?php
require_once 'includes/core.php';

$text = '#在抖音，记录美好生活#板罾 http://v.douyin.com/RjBB4j/ 复制此链接，打开【抖音短视频】，直接观看视频！';
$re = '/http:\/\/v.douyin.com\/(.*)\//m';
$match = [];
preg_match($re, $text, $match);
$text   = $match[0];
echo $text;