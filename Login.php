<?php 
        
	include 'db.php';

	session_start();

	error_reporting(0);

	//Delete Cookie when page is redirected from changePassword or resetform
	if ($_REQUEST['ck'] == 1) {
		$email = $_COOKIE["username"];
		$password = $_COOKIE["pw"];
		setcookie("username", $email, time() - 1);
		setcookie("pw", $password, time() - 1);
		header("Location: Login.php");
	}

	if (isset($_POST['submit'])) {
	

		//storing form input into variables using post global method
		$email = $_POST['username']; 
		$password = $_POST['password_hash'];
		//inbuilt function that escapes special characters to prevent SQL Injections
		$email = mysqli_real_escape_string($conn,$email); 
		$password = mysqli_real_escape_string($conn,$password); 


		//SQL select query that selects the username from database where it's equal to the username entered in the form
		$sql2 = "SELECT * FROM user WHERE username='$email'";
		
		//sql function to process the query above then store in variable called result
		$result = mysqli_query($conn, $sql2);

		//sql function that fetches the result of the query
		$row = mysqli_fetch_assoc($result);

		
         // To verify admin login
		if($email=="admin@gmail.com" && $password=="12345"){ //fixed email and password for admin if form inputs match 

		//store the inputs in varaibles
	    $email = $_POST['username'];
		$password = $_POST['password_hash'];
	    //apply inbuilt function that escapes special characters to prevent SQL Injections
		$email = mysqli_real_escape_string($conn,$email);
		$password = mysqli_real_escape_string($conn,$password);
        
		//set cookie if checkbox is checked
		if (isset($_POST["rememberme"])) {
			setcookie("username", "admin@gmail.com", time() + (86400));
			setcookie("pw", "12345", time() + (86400));							
		}
       
			if(!$row){  //if no row for admin exists

				//define the admins phone number
				$pNum=7777777;
				
				/*We just want to hash our password using the DEFAULT algorithm.
				* This is presently BCRYPT, and will produce a 60 character result.

				* The default changes over time so you would want to prepare
				* By allowing your storage to expand past 60 characters*/

				$passHash = password_hash($password, PASSWORD_DEFAULT); //store the hashed password in a variable
                   
				//insert sql stament to insert admins details in the user table
				$insert = mysqli_query($conn,"INSERT INTO user (username, password_hash, phone, user_role) VALUES('$email','$passHash','$pNum','1')");
                
				//if successfully inserted it will display admin record created and ask the admin to login
				if($insert){
				echo "admin record created";
				echo "<p>&nbsp;&nbsp; <a href='Login.php'>Click here to to Login </a></p>";
				exit();
				}

			}

			else{ //otherwise if a record exists for admin then verify the admins password 

				//take the hashed password from the admin row in the db
				$PassHash = $row['password_hash'];
				
				/*this function verifies the password entered by the user with the hashed password in db
				/*if the password is verfieid store the username in a session to identify the user across different pages*/
				if (password_verify($password, $PassHash)) { 
                  
					$_SESSION['username'] = $email;
					header("Location:viewApplication.php");
					exit();


			}

			else{ //if password doesn't get verified, display wrong password try again

				echo "Incorrect Password, try again";
			
			}

		}

   
	}

      //else if it's not an admin user
	else{
         //get their hashed password from the row variable we stored the sql result inside
		$hashedPasswordThatWasStoredInDB = $row['password_hash'];
		 //verify the password they entered with the password stored in database
		if (password_verify($password, $hashedPasswordThatWasStoredInDB)) { 
			
			//store their email in a session to recognize them 
			$_SESSION['username'] = $email;

			if (isset($_POST["rememberme"])) { //set cookie if checkbox is checked
				setcookie("username", $email, time() + (86400));
				setcookie("pw", $password, time() + (86400));							
			}
			else { //delete cookie if checkbox is not checked
				if(isset($_COOKIE['username']) && isset($_COOKIE["pw"])) {
					$email = $_COOKIE["username"];
					$password = $_COOKIE["pw"];
					setcookie("username", $email, time() - 1);
					setcookie("pw", $password, time() - 1);
				}
			}	

            //take user to homepage if their password gets verified
			header("Location: tabs.php");
				
		}
		else{  //if the password could not be verified

			//Delete Cookie when wrong username or password is entered
			if(isset($_COOKIE['username']) && isset($_COOKIE["pw"])) {
				$email = $_COOKIE["username"];
				$password = $_COOKIE["pw"];
				setcookie("username", $email, time() - 1);
				setcookie("pw", $password, time() - 1);
			}
             //show a pop up script warning user of an incorrect name or password. 
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
 <!--WARNING text style for Caps Lock-->
<style> 
#text {display:none;color:red}
</style>
<body>
	<div class="container">

		<form action="" method="post" class="login-email">
		
			<p class="login-text" style="font-size: 2rem; font-weight: 800;"><img  width="200" 
     height="100" src="RAHWYLogo.png"> </p>
			<div class="input-group">
					 <!--Username-->
				<input type="email" placeholder="Email" name="username" id="user" value="<?php echo $email; ?>" required>
			</div>
			<div class="input-group">
				 <!--Password-->
				<input type="password" placeholder="Password" name="password_hash" id="pass" value="<?php echo $password ?>" required>
				<p id="text">WARNING! Caps lock is ON.</p>
				
			</div>
			<div style="margin-bottom: 15px;">
				<input type="checkbox" id="rememberme" name="rememberme" value="1" >
				Remember me
			</div>
			<div class="input-group">
				 <!--Submit button-->
				<button name="submit" class="btn">Login</button>
			</div> <!--Don't have an account? Hyperlink-->
			<p class="login-register-text">Don't have an account? <a href="register.php">Register Here</a>.</p>
			 <!--Forgot Password Hyperlink-->
			<p class="login-register-text">Forgot Password? <a href="resetform.php">Click here to reset</a>.</p>
		</form>
	</div>
	
	<?php
		//cookies value inserted into input box if cookies exist
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