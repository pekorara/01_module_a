<?php
$file = $_GET['path'];
$mime = mime_content_type('media/' . $file);
if ($mime === 'image/png'){
    $image = imagecreatefrompng( 'media/' .$file);
}else{
    $image = imagecreatefromjpeg( 'media/' .$file);
}

$color = imagecolorallocate($image,255,255,255);
imagestring($image,5,imagesx($image)-100,imagesy($image)-20,'WorldSkills',$color);

header('content-type:' . $mime);
if ($mime === 'image/png'){
    imagepng($image);
}else{
    imagejpeg($image);
}

imagedestroy($image);
