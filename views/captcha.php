<?php
session_start();
header("Content-Type: image/jpeg");

$word = $_SESSION['captcha'];

$image = imagecreate(260, 100);
imagecolorallocate($image, 200, 200, 200);

$fontcolor = imagecolorallocate($image, 20, 20, 20);

$angulo = rand(-5, 5);

imagettftext($image, 35, $angulo, 50, 62, $fontcolor, '../assets/fonts/Acidic.TTF', $word);

imagejpeg($image, null, 100);
?>