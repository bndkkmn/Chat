<?php
$imageName = $_GET['id'];
$imagePath = realpath("../resources/images/".$imageName);
$extension = strtolower(pathinfo($imagePath,PATHINFO_EXTENSION));
header("Content-type: image/$extension");
$image = "";
switch($extension){
    case "jpg":
    case "jpeg":
        $image = imagecreatefromjpeg($imagePath);
        imagejpeg($image);
        break;
    case "png":
        $image = imagecreatefrompng($imagePath);
        imagepng($image);
        break;
}
imagedestroy($image); 
?>