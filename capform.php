<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<form name="form" method="post" action="">
<label><strong>Enter Captcha:</strong></label><br />
<input type="text" id="captcha" name="captcha" ">
<p><br/>
<img src="captcha2.php" alt="CAPTCHA" class="captcha-image" id='captcha_image'>
<i class="fa fa-refresh refresh-captcha"></i>
</p>
<p>Can't read the image?
<a href='javascript: refreshCaptcha();'>click here</a>
to refresh</p>
<input type="submit" name="submit" value="Submit">
</form>



<script>

var refreshButton = document.querySelector(".refresh-captcha");
refreshButton.onclick = function() {
  document.querySelector(".captcha-image").src = 'captcha2.php?' + Date.now();
}

function refreshCaptcha(){
	document.querySelector(".captcha-image").src = 'captcha2.php?' + Date.now();
}
</script>

<?php
session_start();

$status = '';
 
    if(isset($_POST['captcha']) == $_SESSION['captcha']) {
// Validation: Checking entered captcha code with the generated captcha code
if(strcasecmp($_SESSION['captcha'], $_POST['captcha']) != 0){
// Note: the captcha code is compared case insensitively.
// if you want case sensitive match, check above with strcmp()
$status = "<p style='color:#FFFFFF; font-size:20px'>
<span style='background-color:#FF0000;'>Entered captcha code does not match! 
Kindly try again.</span></p>";
}else{
$status = "<p style='color:#FFFFFF; font-size:20px'>
<span style='background-color:#46ab4a;'>Your captcha code is match.</span>
</p>";	
	}
}
echo $status;

?>
