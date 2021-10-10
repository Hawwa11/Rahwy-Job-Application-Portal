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

    <?php

    include("db.php");
?>

<?php
if (isset($_POST['submit'])){
    $user = mysqli_real_escape_string($conn, $_POST['email']);
    $pass = mysqli_real_escape_string($conn, $_POST['password']);
    $pNum = mysqli_real_escape_string($conn, $_POST['phoneNum']);
    
    $uCheck = "SELECT * FROM user WHERE username = '$user'";
    $pCheck = "SELECT * FROM user WHERE phone = '$pNum'";
    $startUCheck= mysqli_query($conn, $uCheck);
    $startPCheck = mysqli_query($conn, $pCheck);
    
    if($_POST['password']!=$_POST['Cpassword']){
      echo "<div class='modal-dialog modal-dialog-centered'>Password and confirm password must be the same</div>";
    }
    else if(mysqli_num_rows($startUCheck)>0){
        echo "This email is already taken please enter a different one";
    }else if(mysqli_num_rows($startPCheck)>0){
        echo "This phone num is already taken please enter a different one";
    }
    else{

    $insert = mysqli_query($conn,"INSERT INTO user (username, password_hash, phone, user_role) VALUES('$user','$pass','$pNum','0')");

    if($insert){
        echo "You have reistered succesfully";
        session_start();
        $_SESSION['username']= $user;
        header("Location:home.php"); 
        exit;
        
    }else{
        echo 'Failed to add new record'.mysqli_error($conn);
    }
}

}
?>

<div id='background'>
</div> 
    <div id='content' class="card border-dark mb-3" style="max-width: 20rem; height: 420px">
    <div class="card-header"><h4 style="font-family: Times New Roman">Register With Us!</h4></div>

       <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post" class="card-body text-dark">
       
       <input type="email" name="email" id="email" placeholder="Email..." class="Finput" required /></br>
       <input type="password" name="password" id="password" placeholder="Password..." class="Finput" required /></br>
       <input type="password" name="Cpassword" id="Cpassword" placeholder="Confirm Password..." class="Finput" required /></br>
       <input type="tel" name="phoneNum" id="phoneNum" placeholder="Phone Number..." class="Finput"  required /></br>
       <input type="checkbox" name="termsCon" required>
       <a style="font-family: Times New Roman"> I accept all</a> <a id="myBtn" href="#" style="font-family: Times New Roman" >terms and conditions</a>
        </input>
       <input type="submit" name="submit" value="Register" class="submit-btn"/></br>
        </form>


    </div>
</div>

<div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <span class="close">&times;</span>
    <h1>General Terms</h1></br>
    <p>By accessing and placing an order with Rawhy, you confirm that you are in agreement with and bound by the terms of service
contained in the Terms & Conditions outlined below. These terms apply to the entire website and any email or other type of
communication between you and Rawhy.
Under no circumstances shall Rawhy team be liable for any direct, indirect, special, incidental or consequential damages, including,
but not limited to, loss of data or profit, arising out of the use, or the inability to use, the materials on this site, even if Rawhy team or
an authorized representative has been advised of the possibility of such damages. If your use of materials from this site results in the
need for servicing, repair or correction of equipment or data, you assume any costs thereof.
Rawhy will not be responsible for any outcome that may occur during the course of usage of our resources. We reserve the rights to
change prices and revise the resources usage policy in any moment.</p>
  </div>
  


</div>
<script>
// Get the modal
var modal = document.getElementById("myModal");

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
btn.onclick = function() {
  modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
</script>
    
</body>
</html>