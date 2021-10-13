<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verify Email</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" type="text/css" href="loginStyle.css">
    <style>
    .containerVerify {
        width: 400px;
        min-height: 20px;
        background: #fff;
        border-radius: 5px;
        box-shadow: 0 0 5px rgba(0, 0, 0, 0.3);
        padding: 40px 30px;
    }
    .bn632-hover {
        width: 100px;
        font-size: 10px;
        font-weight: 600;
        color: #fff;
        cursor: pointer;
        margin: 20px;
        height: 25px;
        text-align:center;
        border: none;
        background-size: 300% 100%;
        border-radius: 0px;
        moz-transition: all .4s ease-in-out;
        -o-transition: all .4s ease-in-out;
        -webkit-transition: all .4s ease-in-out;
        transition: all .4s ease-in-out;
    }

    .bn632-hover:hover {
        background-position: 100% 0;
        moz-transition: all .4s ease-in-out;
        -o-transition: all .4s ease-in-out;
        -webkit-transition: all .4s ease-in-out;
        transition: all .4s ease-in-out;
    }

    .bn632-hover:focus {
        outline: none;
    }

    .bn632-hover.bn20 {
        background-image: linear-gradient(
        to right,
        #667eea,
        #764ba2,
        #6b8dd6,
        #8e37d7
        );
        box-shadow: 0 4px 15px 0 rgba(116, 79, 168, 0.75);
    }
    </style>
</head>
<body>
<?php
    include("db.php");//Includes the database file that makes the connection

    if(!isset($_SESSION))//If statement to start a session if none was started
    { 
        session_start(); 
    }
    $username = $_SESSION['username'];//Saves the username that is stored in the session into a variable
    if(isset($_POST['verify'])){//When the verify button is clicked, this if statement will be run which sends an email to the user providing them with the verification code
        $var = $_POST['email'];//Saves the email entered by the user in a variable
        
        $emailTo = $var;
        $code=rand(100000,999999);//Generates a random 6 digit code
        $_SESSION['vCode'] = $code;//Sending code to verification page

        //Email contents
        $txt = "Your verification code is " . $code;
        $subject = "Email Verification";
        mail($emailTo, $subject, $txt, 'From: rahwyco@gmail.com');//The email function

        //echo '<p>You have received a 6-digit verification code on the email you entered. Kindly enter the code below: </p>';
        //echo "<br>";

        $_SESSION['emailTo'] = $emailTo;//Creates a new session with the new email
    }
?>
</br>
<!--A form that sends a value to verificationResult page-->
<form action="verificationResult.php" method="POST" class="login-email">
        <div class="containerVerify">
            <p class="login-text" style="font-size: 15px; font-weight: 800;" align="justify">You have received a 6-digit verification code on the email you entered. Kindly enter the code below: </p>
            <label for="vCode"></label>
            <div class="input-group">
                <input style="width:195px" type="text" name="vCode" placeholder="Verification Code" required> <input class="bn632-hover bn20" type="submit" name="verifyCode" value="Verify New Email">
            </div>
            
            
        </div>
</form>
</body>
</html>

