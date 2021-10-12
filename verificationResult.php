<?php
    include("db.php");
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    }
    $username = $_SESSION['username'];
    $code = $_SESSION['vCode'];
    $emailTo = $_SESSION['emailTo'];

    //Verifying new email
    if(isset($_POST['verifyCode'])){
        $codeFromUser = $_POST['vCode'];

        if($codeFromUser == $code){
            $update = mysqli_query($conn, "UPDATE user a INNER JOIN form b ON (a.username  = b.username )
            SET
            a.username  = '$emailTo',
            b.username = '$emailTo'
            WHERE a.username = '{$username}' AND b.username = '{$username}' ");
            if($update){
                //Session info is updated when an update is done to update the info being displayed
                $_SESSION['username'] = $emailTo;
                //echo "<script>alert('Email updated successfully')</script>";
                echo "Email updated successfully";
                header( "refresh:5;url=tabs.php" );
            }
            else {
                echo 'Failed to edit record because '.mysqli_error($conn);
            }
        }
        else{
            //echo "<script>alert('Code doesn't match')</script>";
            echo "Code doesn't match";
            header( "refresh:5;url=tabs.php" );
            //header("Location: tabs.php");
        }
    }

?>