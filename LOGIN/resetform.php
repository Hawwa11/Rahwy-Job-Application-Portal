

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style> 
input {
  width: auto;
  padding: 10px 10px;
  margin: 8px 0;
  box-sizing: border-box;
  border: none;
  border-bottom: 2px solid blue;
}
</style>
</head>
<body>

<h1>Reset your password</h1></br>

<div id='background'>
    <div id='content'>

       <form action="" method="post">
       To reset your password, Please provide:
  
    </br>
         <input type="email" name="username" id="email" placeholder="Enter your username..." required /></br>
       <input type="tel" name="phone" id="phone" placeholder="Enter your phone number..." required /></br>

       <input type="submit" name="submit" value="Submit"/></br>
      </form>

</html>

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
   
     if($row){ 
      
      
      ?>
     <form action="" method="post">
      Enter your new password
    <input type='password' name='password_hash' id='newpass' placeholder='Password' required /></br>
     
   <input type='submit' name='submit2' value='Reset Password'/></br>
     </form>
   
     <?php 
  }
  else{
    echo "Incorrect username or phone number. Please try again!";
    echo "<br>";
    echo "<br>";
          }

        }

      }
           if(isset($_POST["submit2"])){

            $password=$_POST["password_hash"];

           $sql="UPDATE user SET password_hash='$password'";
       
           $result=mysqli_query($conn,$sql);
       
           if(!$result){
       
                   die("Query failed".mysqli_error($conn));
       
           }
       
           else{
             echo "<br>";
             echo "<br>";
               echo "Password has been successfully reset ";
               echo "<br>";
               echo "<br>";
               echo "<a href='Login.php'>Click here to to Login </a>";
       
            }
       
           }

    ?>
   

        