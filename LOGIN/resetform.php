<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register With Us!</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <style> 
.Finput {
  width: 100%;
  padding: 10px 10px;
  margin: 5px 0;
  box-sizing: border-box;
  border: none;
  border-bottom: 1px solid black;
}
.center {
  margin: auto;
  width: 50%;
  border: 3px;
  padding: 10px;
}

body {font-family: Arial, Helvetica, sans-serif;}
* {box-sizing: border-box;}

/* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  padding-top: 100px; /* Location of the box */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content */
.modal-content {
  background-color: #fefefe;
  margin: auto;
  padding: 20px;
  border: 1px solid #888;
  width: 40%;
}

/* The Close Button */
.close {
  color: #aaaaaa;
  float: right;
  font-size: 28px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: #000;
  text-decoration: none;
  cursor: pointer;
}
a:hover {
  cursor: pointer;
}
.card {
        margin: 0 auto; /* Added */
        float: none; /* Added */
        margin-bottom: 10px; /* Added */
        margin-top: 80px; 
        border-radius: 30px;
}
.submit-btn{
    width: 85%;
    padding: 10px 30px;
    cursor: pointer;
    display: block;
    margin: auto;
    margin-top: 30px;
    background: linear-gradient(to right, #2a2966, #a84392);
    border: 0;
    outline: none;
    border-radius: 30px;
    color: white;

}

.backgroundimg2{
    /* Background pattern from Toptal Subtle Patterns */
   background-image: url("registrationBg.jpg");
   height: 400px;
   width: 100%;
}
.logo{ 
	position:fixed; 
	top:0; 
	left:0; 
}
.form-group {
   margin-bottom: 0px!important;
}



</style>
</head>
<body class="backgroundimg2">
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

<div id='background'>
<div id="logo" class="logo"> 
	<img  width="200" 
     height="100" src="RAHWYLogo.png"> 
</div> 
    <div id='content' class="card border-dark mb-3" style="max-width: 20rem; height: 420px">
    <div class="card-header"><h4 style="font-family: Times New Roman">Reset your form here</h4></div>
    <div class="card-header"><h4 style="font-family: Times New Roman">To reset your password, Please provide</h4></div>

  
    </br>
         <input type="email" name="username" id="email" placeholder="Enter your username..." class="Fininput" required /></br>
       <input type="tel" name="phone" id="phone" placeholder="Enter your phone number..." class="Fininput" required /></br>

       <input type="submit" name="submit" value="Submit" class="submit-btn"/></br>
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
    <input type='password' name='password_hash' id='newpass' placeholder='Password' class="Fininput" required /></br>
     
   <input type='submit' name='submit2' value='Reset Password' class="submit-btn"/></br>
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
   
