<?php
$folder = $_GET['folder'] . '.zip';
$zip = new ZipArchive();
$zip->open('upload/' . $folder,ZipArchive::OVERWRITE | ZipArchive::CREATE);
for ($i = 0; $i < count($_FILES['files']['name']); $i++) {
    $zip->addFile($_FILES['files']['tmp_name'][$i],$_POST["paths"][$i]);
}
$zip->close();
echo 'upload/' . $folder;


//$folder = $_GET['folder'] . '.zip';
//$zip = new ZipArchive();
//$zip->open(__DIR__ . '/upload/' . $folder,ZipArchive::CREATE | ZipArchive::OVERWRITE);
//for ($i = 0; $i < count($_FILES['files']['name']); $i++) {
//    $zip->addFile($_FILES['files']['tmp_name'][$i],$_POST['paths'][$i]);
//}
//
//$zip->close();
//echo 'upload/' . $folder;