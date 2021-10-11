<?php
    include("db.php");

    if(!isset($_SESSION)) 
    { 
        session_start(); 
    }
    $username = $_SESSION['username'];
    if(isset($_POST['verify'])){
        $var = $_POST['email'];
        
        $emailTo = $var;
        $code=rand(100000,999999);
        $_SESSION['vCode'] = $code;//Sending code to verification page

        $txt = "Your verification code is " . $code;
        $subject = "Email Verification";

        mail($emailTo, $subject, $txt, 'From: rahwyco@gmail.com');

        echo 'You have received a 6-digit verification code on the email you entered. Kindly enter the code below: ';
        echo "<br>";

        $_SESSION['emailTo'] = $emailTo;
    }
?>

<form action="verificationResult.php" method="POST">
        <div>
            <label for="vCode"><b>New Email: </b></label>
            <input type="text" name="vCode" placeholder="Verification Code" required>
            <input type="submit" name="verifyCode" value="Verify New Email">
        </div>
</form>