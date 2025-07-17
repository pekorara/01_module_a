<?php

$cell_size = $_GET['cell_size'] ?? 50;
$image = imagecreatefromjpeg('original.jpg');
$imageX = imagesx($image);
$imageY = imagesy($image);
$result = imagecreatetruecolor($imageX,$imageY);

for ($y = 0; $y < $imageY; $y+=$cell_size) {
    for ($x = 0; $x < $imageX; $x+=$cell_size) {
        $width = min($cell_size,$imageX - $x);
        $height = min($cell_size,$imageY - $y);
        $p = $width * $height;
        $r = $g = $b = 0;
        for ($i = 0; $i < $width; $i++) {
            for ($j = 0; $j < $height; $j++) {
                $rgb = imagecolorat($image,$i + $x,$j + $y);
                $r += ($rgb >> 16) & 0xff;
                $g += ($rgb >> 8) & 0xff;
                $b += ($rgb) & 0xff;
            }
        }

        imagefilledrectangle($result,$x,$y,$x + $width - 1,$y + $height - 1,imagecolorallocate($result,$r/$p,$g/$p,$b/$p));
    }
}

header('content-type:image/jpeg');
imagejpeg($result);

//$img = imagecreatefromjpeg("original.jpg");
//$result = imagecreatetruecolor(imagesx($img), imagesy($img));
//
//for ($y = 0; $y < imagesy($img); $y += $cell_size) {
//    for ($x = 0; $x < imagesx($img); $x += $cell_size) {
//        $width = min($cell_size, imagesx($img) - $x);
//        $height = min($cell_size, imagesy($img) - $y);
//        $p = $width * $height;
//        $r = $g = $b = 0;
//        for ($i = 0; $i < $width; $i++) {
//            for ($j = 0; $j < $height; $j++) {
//                $rgb = imagecolorat($img,$x + $i,$y + $j);
//                $r += ($rgb >> 16) & 0xff;
//                $g += ($rgb >> 8) & 0xff;
//                $b += $rgb & 0xff;
//            }
//        }
//        imagefilledrectangle($result,$x,$y,$x + $width - 1,$y + $height - 1,imagecolorallocate($result,$r/$p,$g/$p,$b/$p));
//    }
//}
//
//header('content-type:image/png');
//imagepng($result);
//imagedestroy($result);
//imagedestroy($img);
