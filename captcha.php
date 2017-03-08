<?php
	session_start();
	$string = "";
	//generate random chars
	for ($i = 0; $i < 5; $i++)
	{
		if($i % 2 === 0)
			$string .= chr(rand(97, 122));
		else
			$string .= chr(rand(48, 57));
	}
	//write string into current session & compare it in register.php with input values
	$_SESSION['rand_code'] = $string;

	$dir = "fonts/"; // font address

	$image = imagecreatetruecolor(170, 60);
	$color = imagecolorallocate($image, 200, 100, 90); //text-color
	$white = imagecolorallocate($image, 255, 255, 255); // background-color;
	//create bg
	imagefilledrectangle($image,0,0,399,99,$white);
	//print string;
	imagettftext ($image, 30, 0, 10, 40, $color, $dir."verdana.ttf", $_SESSION['rand_code']);

	header("Content-type: image/png");
	imagepng($image);
?>