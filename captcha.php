<?php


$chars = '1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZ'; 
$string = '';
$lebar = 85; 
$panjang = 35;
$gbr = imagecreate($lebar, $panjang);
$ltr = imagecolorallocate($gbr, 0, 0, 0);
$pjg_karakter = 6; 

for ($i = 0; $i < $pjg_karakter; $i++) {
    $pos = rand(0, strlen($chars)-1);
    $string .= $chars{$pos};
}


$ltrR = mt_rand(100, 200); $ltrG = mt_rand(100, 200); $ltrB = mt_rand(100, 200);
$noise_color = imagecolorallocate($gbr, abs(255 - $ltrR), abs(105 - $ltrG), abs(255 - $ltrB));
for($i = 0; $i < ($lebar*$panjang) / 3; $i++) {
    imagefilledellipse($gbr, mt_rand(0,$lebar), mt_rand(0,$panjang), 3, rand(2,5), $noise_color);
}

$warna_text = imagecolorallocate($gbr, 240, 240, 240);
$rand_x = rand(0, $lebar - 50);
$rand_y = rand(0, $panjang - 15);
imagestring($gbr, 12, $rand_x, $rand_y, $string, $warna_text);
header ("Content-type: image/png"); 
imagepng($gbr);


?>
