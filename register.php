<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <style> 
input {
  width: auto;
  padding: 10px 10px;
  margin: 8px 0;
  box-sizing: border-box;
  border: none;
  border-bottom: 2px solid black;
}
.center {
  margin: auto;
  width: 50%;
  border: 3px solid green;
  padding: 10px;
}

body {font-family: Arial, Helvetica, sans-serif;}
* {box-sizing: border-box;}

/* Button used to open the contact form - fixed at the bottom of the page */
.open-button {
  background-color: #555;
  color: white;
  padding: 16px 20px;
  border: none;
  cursor: pointer;
  opacity: 0.8;
  position: fixed;
  bottom: 23px;
  right: 28px;
  width: 280px;
}

/* The popup form - hidden by default */
.form-popup {
  display: none;
  position: fixed;
  bottom: 0;
  right: 15px;
  border: 3px solid #f1f1f1;
  z-index: 9;
}

/* Add styles to the form container */
.form-container {
  max-width: 300px;
  padding: 10px;
  background-color: white;
}

/* Full-width input fields */
.form-container input[type=text], .form-container input[type=password] {
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  border: none;
  background: #f1f1f1;
}

/* When the inputs get focus, do something */
.form-container input[type=text]:focus, .form-container input[type=password]:focus {
  background-color: #ddd;
  outline: none;
}

/* Set a style for the submit/login button */
.form-container .btn {
  background-color: #04AA6D;
  color: white;
  padding: 16px 20px;
  border: none;
  cursor: pointer;
  width: 100%;
  margin-bottom:10px;
  opacity: 0.8;
}

/* Add a red background color to the cancel button */
.form-container .cancel {
  background-color: red;
}

/* Add some hover effects to buttons */
.form-container .btn:hover, .open-button:hover {
  opacity: 1;
}
a:hover {
  cursor: pointer;
}
</style>
</head>
<body>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

    <?php

    include("db.php");
?>

<h1>Register with us today!</h1></br>

<div id='background' >
    <div id='content' class="center">

       <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
       
       <input type="email" name="email" id="email" placeholder="Enter your email..." required /></br>
       <input type="password" name="password" id="password" placeholder="Enter your password..." required /></br>
       <input type="password" name="Cpassword" id="Cpassword" placeholder="Confirm your password..." required /></br>
       <input type="tel" name="phoneNum" id="phoneNum" placeholder="Enter your phone number..." required /></br>
       <input type="checkbox" name="termsCon" required></input></br>
        I accept all <a onclick="openForm()">terms and conditions</a>
       <input type="submit" name="submit" value="Submit" class="btn btn-primary"/></br>
        </form>


    </div>
</div>

<?php
if (isset($_POST['submit'])){
    $user = mysqli_real_escape_string($conn, $_POST['email']);
    $pass = mysqli_real_escape_string($conn, $_POST['password']);
    $pNum = mysqli_real_escape_string($conn, $_POST['phoneNum']);
    $Cpass= mysqli_real_escape_string($conn, $_POST['Cpassword']);
    
    $uCheck = "SELECT * FROM user WHERE username = '$user'";
    $pCheck = "SELECT * FROM user WHERE phone = '$pNum'";
    $startUCheck= mysqli_query($conn, $uCheck);
    $startPCheck = mysqli_query($conn, $pCheck);
    
    if($pass != $cpass){
        echo "Please confrim password correctly";
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
        header("Location:home.php?user=$user");
        
    }else{
        echo 'Failed to add new record '.mysqli_error($conn);
    }
}

}
?>

<div class="form-popup" id="myForm">

    This is the terms and conditions popup you will have to accept
    to continue
    <button type="button" class="btn cancel" onclick="closeForm()">Close</button>
</div>
<script>
function openForm() {
  document.getElementById("myForm").style.display = "block";
}

function closeForm() {
  document.getElementById("myForm").style.display = "none";
}
</script>
    
</body>
</html>