<?php 

	include 'db.php';

	session_start();

	error_reporting(0);

	if (isset($_POST['submit'])) {


		$email = $_POST['username'];
		$password = $_POST['password_hash'];
		$email = mysqli_real_escape_string($conn,$email);
		$password = mysqli_real_escape_string($conn,$password);


		
		$sql2 = "SELECT * FROM user WHERE username='$email'";
		
		$result = mysqli_query($conn, $sql2);
		$row = mysqli_fetch_assoc($result);

		
         
		if($email=="admin@gmail.com" && $password=="12345"){

	    $email = $_POST['username'];
		$password = $_POST['password_hash'];
		$email = mysqli_real_escape_string($conn,$email);
		$password = mysqli_real_escape_string($conn,$password);
        
       
			if(!$row){

				
				$pNum=7777777;
				$passHash = password_hash($password, PASSWORD_DEFAULT);

				$insert = mysqli_query($conn,"INSERT INTO user (username, password_hash, phone, user_role) VALUES('$email','$passHash','$pNum','1')");
                
				if($insert){
				echo "admin record created";
				echo "<p>&nbsp;&nbsp; <a href='Login.php'>Click here to to Login </a></p>";
				exit();
				}

			}

			else{

				$PassHash = $row['password_hash'];
				
				if (password_verify($password, $PassHash)) { 

					$_SESSION['username'] = $email;
					header("Location:viewApplication.php");
					exit();


			}

			else{

				echo "wrong Password try AGAIN";
			
			}

		}

   
	}


	else{

		$hashedPasswordThatWasStoredInDB = $row['password_hash'];
		if (password_verify($password, $hashedPasswordThatWasStoredInDB)) { 
				
			$_SESSION['username'] = $email;

			if (isset($_POST["rememberme"])) {
				setcookie("username", $email, time() + (86400));
				setcookie("pw", $password, time() + (86400));							
			}
			else {
				if(isset($_COOKIE['username']) && isset($_COOKIE["pw"])) {
					$email = $_COOKIE["username"];
					$password = $_COOKIE["pw"];
					setcookie("username", $email, time() - 1);
					setcookie("pw", $password, time() - 1);
				}
			}	


			header("Location: tabs.php");
				
		}
		else{
			if(isset($_COOKIE['username']) && isset($_COOKIE["pw"])) {
				$email = $_COOKIE["username"];
				$password = $_COOKIE["pw"];
				setcookie("username", $email, time() - 1);
				setcookie("pw", $password, time() - 1);
			}
			echo "<script>alert('Woops! Email or Password is Wrong.');window.location='Login.php';</script>";
		}

	}

}
	
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

	<link rel="stylesheet" type="text/css" href="loginStyle.css">

	<title>Login Form</title>
</head>

<style>
#text {display:none;color:red}
</style>
<body>
	<div class="container">
		<form action="" method="post" class="login-email">
			<p class="login-text" style="font-size: 2rem; font-weight: 800;"><img  width="200" 
     height="100" src="RAHWYLogo.png"> </p>
			<div class="input-group">
				<input type="email" placeholder="Email" name="username" id="user" value="<?php echo $email; ?>" required>
			</div>
			<div class="input-group">
				<input type="password" placeholder="Password" name="password_hash" id="pass" value="<?php echo $password ?>" required>
				<p id="text">WARNING! Caps lock is ON.</p>
				
			</div>
			<div style="margin-bottom: 15px;">
				<input type="checkbox" id="rememberme" name="rememberme" value="1" >
				Remember me
			</div>
			<div class="input-group">
				<button name="submit" class="btn">Login</button>
			</div>
			<p class="login-register-text">Don't have an account? <a href="register.php">Register Here</a>.</p>
			<p class="login-register-text">Forgot Password? <a href="resetform.php">Click here to reset</a>.</p>
		</form>
	</div>
	
	<?php
		if(isset($_COOKIE['username']) && isset($_COOKIE["pw"])) {
			$email = $_COOKIE["username"];
			$password = $_COOKIE["pw"];
			echo "<script>
				document.getElementById('user').value = '$email';
				document.getElementById('pass').value = '$password';
				document.getElementById('rememberme').checked = true;
			</script>";
		}
	?>


<script>
var input = document.getElementById("pass");

// Get the warning text
var text = document.getElementById("text");

// When the user presses any key on the keyboard, run the function
input.addEventListener("keyup", function(event) {

  // If "caps lock" is pressed, display the warning text
  if (event.getModifierState("CapsLock")) {
    text.style.display = "block";
  } else {
    text.style.display = "none"
  }
});

</script>
</body>
</html>