

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

	<link rel="stylesheet" type="text/css" href="loginStyle.css">

	<title>Reset your password</title>
</head>

<body>
	<div class="container" id="reset">
		<form action="" method="post" class="login-email">
			<p class="login-text" style="font-size: 2rem; font-weight: 800;"><img  width="200" 
     height="100" src="RAHWYLogo.png"> </p>
     <center><div><h2 style="font-family: Times New Roman">Reset Password</h2></div></center>
     <br>
     <br>
		   <div class="input-group">
      <input type="email" name="username" id="email" placeholder="Enter your Username" required /></br>
       <input type="tel" name="phone" id="phone" placeholder="Enter your phone number" required /></br>
       </div>
       <br>
       <br>
       <br>
			<div class="input-group">
				<center><button name="submit" class="btn2">Submit</button></center>
        <br>
        <br>
			</div>
</div>
</form>

<?php
include "db.php";

   if(isset($_POST["submit"])){

 
	$email = $_POST['username'];
	$pNum = $_POST['phone'];

    $user = mysqli_real_escape_string($conn, $email);
    $pNum = mysqli_real_escape_string($conn, $pNum);

    $sql = "SELECT * FROM user WHERE username='$email' AND phone='$pNum'";
    
	$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

	if (!$result) {
	  
		echo "Query Failed";

	} 

  else {
   
     if(!$row){ 

 
    echo "<p>&nbsp;&nbsp; Incorrect username or phone number.</p>";
    echo "<p>&nbsp;&nbsp; Please try again</p>";
  
       ?>
       </div>

       <?php
          }

        else{

          ?>
<script type="text/javascript">document.getElementById('reset').style.display = 'none';</script>
<?php
}

?>
    <html>
    <div class="container" id="newpass">
    <p class="login-text" style="font-size: 1.5rem; font-weight: 800;">Enter your new password</p>
		<form action="" method="post" class="login-email">
    <div class="input-group">
    <input type='password' name='password_hash' id='newpass' placeholder='Password' required /></br>
    </div>
    <div class="input-group">
   <input type='submit' name='submit2' value='Reset Password' class="btn2"/></br>
   
     </form>
   </div>
   </html>
   <?php

        }

    }
    if(isset($_POST["submit2"])){

            $password=$_POST["password_hash"];

            $passH = password_hash($password, PASSWORD_DEFAULT);

           $sql="UPDATE user SET password_hash='$passH'";
       
           $result=mysqli_query($conn,$sql);
       
           if(!$result){
       
                   die("Query failed".mysqli_error($conn));
       
           }
       
           else{

            ?>
           
          
            <p class="login-register-text">Password Successfully Reset <a href="Login.php">Click here to Login</a>.</p>
            <br>
           </div>
</form>
</html>
      
            <?php
          }
       
            }
      
          ?>

    

   
   
