<?php
 
session_start();
 
// Alphanumeric string of characters
$permitted_chars = 'ABCDEFGHJKLMNOPQRSTUVWXYZabcdfghjkmnpqrstvwxyz123456789';
  
// Function to generate a random string 
function generate_string($input, $strength = 10) {  
    $input_length = strlen($input);
    $random_string = '';
    for($i = 0; $i < $strength; $i++) {         // Uses a loop to generate each random character
        $random_character = $input[mt_rand(0, $input_length - 1)];
        $random_string .= $random_character;
    }
  
    return $random_string;
}
 
// GD function to generate an image 
$image = imagecreatetruecolor(200, 50);
 
// Activate methods for lines and polygons.
imageantialias($image, true);
 
// Define colors array and the three primary colors
$colors = [];
 
$red = rand(125, 175);
$green = rand(125, 175);
$blue = rand(125, 175);
 
// Loop used to generate random colors using the primary colors and store in colors array
for($i = 0; $i < 5; $i++) {
  $colors[] = imagecolorallocate($image, $red - 20*$i, $green - 20*$i, $blue - 20*$i);
}
 
// Base image color set to color at index 0 in colors array
imagefill($image, 0, 0, $colors[0]);
 
// Draw polygons of diffents shades of the base color 
for($i = 0; $i < 10; $i++) {
  imagesetthickness($image, rand(2, 10));
  $line_color = $colors[rand(1, 4)]; // Get random index from colors array
  imagerectangle($image, rand(-10, 190), rand(-10, 10), rand(-10, 190), rand(40, 60), $line_color); //Draw pologon with four lines drwan on random
}
 
// Set the colors and font for the text
$black = imagecolorallocate($image, 0, 0, 0);
$white = imagecolorallocate($image, 255, 255, 255);
$textcolors = [$black, $white];
 
$fonts = 'MONOFONT.ttf';
 
// Set the length of the string and generate a captcha code using the functiion created above to generate string
$string_length = 6;
$captcha_string = generate_string($permitted_chars, $string_length);
 
// Store the captcah code in session so can be used to compare in regiter form
$_SESSION['captcha'] = $captcha_string;
 
// Draw the characters in captcha code 
for($i = 0; $i < $string_length; $i++) {
  $letter_space = 170/$string_length;
  $initial = 15;
   // Create the text in random positions
  imagettftext($image, 24, rand(-15, 15), $initial + $i*$letter_space, rand(25, 45), $textcolors[rand(0, 1)], $fonts, $captcha_string[$i]);
}
 
// Generate and destroy the image fucntions
header('Content-type: image/png');
imagepng($image);
imagedestroy($image);
?>