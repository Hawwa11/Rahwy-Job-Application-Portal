<?php 

include 'db.php';

session_start();

error_reporting(0);


if (isset($_POST['submit'])) {

	
	$email = $_POST['username'];
	$password = $_POST['password_hash'];

    
	
	$email = mysqli_real_escape_string($conn,$email);
	$password = mysqli_real_escape_string($conn,$password);
	

	$sql = "SELECT * FROM user WHERE username='$email' AND password_hash='$password'";
   

	$result = mysqli_query($conn, $sql);
	$row = mysqli_fetch_assoc($result);
	if (!$result) {
	  
	
		echo "Query Failed";

	} 


	else{

	
      if($row){

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

		$_SESSION['username'] = $row['username'];
		header("Location: tabs.php");
		

		}

		else{
			echo "<script>alert('Woops! Email or Password is Wrong.')</script>";
			
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

	<link rel="stylesheet" type="text/css" href="style.css">

	<title>Login Form</title>
</head>
<body>
	<div class="container">
		<form action="" method="post" class="login-email">
			<p class="login-text" style="font-size: 2rem; font-weight: 800;"><img  width="200" 
     height="100" src="RAHWYLogo.png"> </p>
			<div class="input-group">
				<input type="email" placeholder="Email" name="username" id="username" value="<?php echo $email; ?>" required>
			</div>
			<div class="input-group">
				<input type="password" placeholder="Password" name="password_hash" id="password_hash" value="<?php echo $password ?>" required>
				
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
				document.getElementById('username').value = '$email';
				document.getElementById('password_hash').value = '$password';
				document.getElementById('rememberme').checked = true;
			</script>";
		}
	?>
</body>
</html>