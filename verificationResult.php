<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verification Result</title>
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
    </style>
</head>
<body>
<?php
    include("db.php");
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    }
    //Storing values from sesssions into variables
    $username = $_SESSION['username'];
    $code = $_SESSION['vCode'];
    $emailTo = $_SESSION['emailTo'];

    //Verifying new email
    if(isset($_POST['verifyCode'])){
        $codeFromUser = $_POST['vCode'];//Saving the varification code that the user entered from previous page into a variable

        if($codeFromUser == $code){//An if statement that gets executed if the user entered the correct verification code sent to them
            //A query that updates the database with the new email that the user entered
            $update = mysqli_query($conn, "UPDATE user a INNER JOIN form b ON (a.username  = b.username )
            SET
            a.username  = '$emailTo',
            b.username = '$emailTo'
            WHERE a.username = '{$username}' AND b.username = '{$username}' ");
            if($update){
                //Session info is updated when an update is done to update the info being displayed
                $_SESSION['username'] = $emailTo;

                echo '<script>alert("Email Updated Successfully")</script>'; 
                header( "refresh:1;url=tabs.php" );//Automatically directs the user to the tabs page after specific time
            }
            else {
                echo 'Failed to edit record because '.mysqli_error($conn);
            }
        }
        else{
            echo '<script>alert("Code Does not match")</script>'; 
            header( "refresh:1;url=tabs.php" );
        }
    }

?>
</body>
</html>
