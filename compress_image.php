<?php
$img = imagecreatefromwebp('public/img/carrucel/relaxing.webp');
$width = imagesx($img);
$height = imagesy($img);
echo "Original: ${width}x${height}\n";
$newWidth = 1920;
$newHeight = (int)($height * ($newWidth / $width));
$newImg = imagescale($img, $newWidth, $newHeight, IMG_BICUBIC);
imagewebp($newImg, 'public/img/carrucel/relaxing.webp', 75);
imagedestroy($img);
imagedestroy($newImg);
echo "Compressed!\n";