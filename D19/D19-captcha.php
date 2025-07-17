<?php
session_start();
$width = 200;
$height = 50;
$image = imagecreatetruecolor($width,$height);
$color = imagecolorallocate($image,255,255,255);
imagefill($image,0,0,$color);
$string = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ23456789';
$str = '';
for ($i = 0; $i < 4; $i++) {
    $str .= $string[rand(0,strlen($string) - 1)];
}

$_SESSION['code'] = $str;

for ($k = 0; $k < 4; $k++) {
    $s = $str[$k];
    $temp = imagecreatetruecolor(50,50);
    imagefill($temp,0,0,imagecolorallocate($temp,255,255,255));

    imagestring($temp,5,25,25,$s,imagecolorallocate($temp,0,0,0));
    $rotate = imagerotate($temp,10,imagecolorallocate($temp,255,255,255));

    imagecopy($image,$rotate,$k * 50,rand(-10,10),0,0,50,50);
    imagedestroy($temp);
    imagedestroy($rotate);
}

for ($j = 0; $j < 4; $j++) {
    $line = imageline($image,rand(0,$width),rand(0,$height),rand(0,$width),rand(0,$height),imagecolorallocate($image,0,0,0));
}

header('content-type:image/png');
imagepng($image);
imagedestroy($image);