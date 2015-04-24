<?php
header("Content-type: image/png");
//Maeda Hanafi
//CSC543
//Assignment #4

$image=imagecreatetruecolor(100, 100); 
//_____________________colors____________________________ 
$my_color1=imagecolorallocate($image,0xFF,0x00,0x00); 
$my_colorBG=imagecolorallocate($image,100,150,215); 
$my_color2=imagecolorallocate($image,0xBF,0x40,0x00); 
$my_color3=imagecolorallocate($image,0x80,0x80,0x00);
$my_color4 = imagecolorallocate($image, 0x40, 0xBF, 0x00);
$my_color5 = imagecolorallocate($image, 0x00, 0xFF, 0x00);
//_______________________________________________________
imagefilledrectangle($image,0,0,250,200,$my_colorBG);

if($_GET["3"]!=$_GET["4"])
imagefilledarc($image,50,50, 50, 25, $_GET["3"], $_GET["4"],  $my_color5, IMG_ARC_PIE); 
if($_GET["2"]!=$_GET["3"])
imagefilledarc($image,50,50, 50, 25, $_GET["2"], $_GET["3"],  $my_color4, IMG_ARC_PIE);
if($_GET["1"]!=$_GET["2"])
imagefilledarc($image,50,50, 50, 25, $_GET["1"], $_GET["2"],  $my_color3, IMG_ARC_PIE); 
if($_GET["0"]!=$_GET["1"])
imagefilledarc($image,50,50, 50, 25, $_GET["0"], $_GET["1"],  $my_color2, IMG_ARC_PIE); 
if(0!=$_GET["0"])
imagefilledarc($image,50,50, 50, 25,  0, $_GET["0"],  $my_color1, IMG_ARC_PIE);  
//imagefilledarc($image,100,75, 50, 25, 75, 360, $my_color3 , IMG_ARC_PIE);
 //___________________________________________________________________ 
imagepng($image); 
imagedestroy($image); 
?> 
