<!DOCTYPE html>
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
  border-bottom: 2px solid black;
}
</style>
</head>
<body>
    <?php

    include("db.php");
?>

<h1>Register with us today!</h1></br>

<div id='background'>
    <div id='content'>

       <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
       
       <input type="email" name="email" id="email" placeholder="Enter your email..." required /></br>
       <input type="password" name="password" id="password" placeholder="Enter your password..." required /></br>
       <input type="Cpassword" name="Cpassword" id="Cpassword" placeholder="Confirm your password..." required /></br>
       <input type="tel" name="phoneNum" id="phoneNum" placeholder="Enter your phone number..." required /></br>
       <input type="submit" name="submit" value="Submit" onclick="home.php"/></br>
        </form>


    </div>
</div>

<?php
if (isset($_POST['submit'])){
    $user = mysqli_real_escape_string($conn, $_POST['email']);
    $pass = mysqli_real_escape_string($conn, $_POST['password']);
    $pNum = mysqli_real_escape_string($conn, $_POST['phoneNum']);

    $insert = mysqli_query($conn,"INSERT INTO user (username, password_hash, phone, user_role) VALUES('$user','$pass','$pNum','0')");

    if($insert){
        echo "You have reistered succesfully";
        //sleep(5);
        //echo "window.location = \'home.php?us='.$user.'\'";
    }else{
        echo 'Failed to add new record '.mysqli_error($conn);
    }
}

?>

    
</body>
</html>