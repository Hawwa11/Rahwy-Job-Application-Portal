

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

	<link rel="stylesheet" type="text/css" href="loginStyle.css">
 

	<title>Reset your password</title>
</head>

<body> <!--HTML FORM-->
	<div class="container" id="reset">
 
		<form action="" method="post" class="login-email">
			<p class="login-text" style="font-size: 2rem; font-weight: 800;"><img  width="200" 
     height="100" src="RAHWYLogo.png"> </p>
     <center><div><h2 style="font-family: Times New Roman">Reset Password</h2></div></center>
     <br>
     <br>
		   <div class="input-group">
         	 <!--Username-->
      <input type="email" name="username" id="email" placeholder="Enter your Username" required /></br>
      <br>
      	 <!--Phone Number-->
       <input type="tel" name="phone" id="phone" placeholder="Enter your phone number" required /></br>
       </div>
       <br>
       <br>
       <br>
       <br>
			<div class="input-group">
        	 <!--Submit button-->
				<center><button name="submit" class="btn2">Submit</button></center>
        <br>
        <br>
			</div>
</div>
</form>

<?php
include "db.php";
 //if reset form is submitted 
   if(isset($_POST["submit"])){

 //store username and phone number in variables
	$email = $_POST['username'];
	$pNum = $_POST['phone'];

//function to escape special characters and prevent sql interjections 
    $user = mysqli_real_escape_string($conn, $email);
    $pNum = mysqli_real_escape_string($conn, $pNum);

//Select username and phonenumber from database to see if they match the inputs given by the user.
    $sql = "SELECT * FROM user WHERE username='$email' AND phone='$pNum'";
    //process the sql query and store it in a result variable
	$result = mysqli_query($conn, $sql);

  //fetch the result variable using  my_sql_fetch_assoc and store in row variable 
$row = mysqli_fetch_assoc($result);

//if no result then display query failed
	  
	if (!$result) {
	  
		echo "Query Failed";

	} 

  else { // otherwise if the query was processed

    //check if there are no rows in the db that matches the inpututted username and phonenumber
     if(!$row){   
      
         //dsipaly javascript alert box to show an error message
      echo "<script>alert('Incorrect username or Phone number is Wrong.');window.location='resetform.php';</script>";

  
       ?>
       </div>

       <?php
          }

        else{     /*else if there is an existing record of the inputted username and phone number
          /*show new html div container to capture the user's new passsword*/

          ?>
<script type="text/javascript">document.getElementById('reset').style.display = 'none';</script>


    <html>
    <div class="container" id="newpass">
    
		<form action="" method="post" class="login-email">
    <p class="login-text" style="font-size: 2rem; font-weight: 800;"><img  width="200" 
     height="100" src="RAHWYLogo.png"> </p>
     <center><div><h2 style="font-family: Times New Roman">Enter your new password</h2></div></center>
    <div class="input-group">
      <br>
      <br>
       <!--New Password-->
    <input type='password' name='password_hash' id='newpass' placeholder='Password' required /></br>
    </div>
    <br>
        <br>
     
    <div class="input-group">  
       <!--Submit button-->
   <input type='submit' name='submit2' value='Reset Password' class="btn2"/></br>
        </div>
       
     </form>
   </div>
   </html>
   <?php

        }

    }

  }
     //if form is submitted

    if(isset($_POST["submit2"])){

      //store the inputted password in a variable

            $password=$_POST["password_hash"];

            //hash the password using the password hash function and DEFAULT algorithm
            $passH = password_hash($password, PASSWORD_DEFAULT);
    
            //use SQL Update statement to update the password in db with hashed password
           $sql="UPDATE user SET password_hash='$passH'";
            
        //process sql query and store in result variable
           $result=mysqli_query($conn,$sql);
             
           //if query in result variable fails show the cause of the error using the mysqli_error inbuilt function
           if(!$result){
       
                   die("Query failed".mysqli_error($conn));
       
           }
       
           else{
              //if query is processed show a script alert box displaying a success message
            echo "<script>alert('Password has been reset Successfully.');window.location='Login.php?ck=1';</script>";
     
          }
       
            }
      
          ?>

    

   
   
