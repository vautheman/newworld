<?php
session_start();
header("Content-Type:image/png");
$img = imagecreate(100,30);
$couleurFond = imagecolorallocate($img, 0, 0, 0);

$text = exec("pwgen 5 1");
$_SESSION['textimg'] = $text;
$textColor = imagecolorallocate($img, 255, 255, 255);
/*
switch($police)
{
  case 1: './Roboto-Bold.ttf';
  break;
  case 2: './Roboto-BoldItalic.ttf';
  break;
  case 3: './Roboto-Light.ttf';
  break;
}
*/
//$police = rand(1, 3);
$taillePolice = 12;
//$size = rand(10,20);
//$angle = rand(-50, 50);
//$x = $x + rand(50, 80);
//$y = rand(40, 60);
$abcisse = 15;
$ordonnée = 6;
imagestring($img, $taillePolice, $abcisse, $ordonnée, $text, $textColor);

//imagettftext($img, $taillePolice, $angle, $x, $y, $textColor, $police, $text);
imagepng($img);

?>
