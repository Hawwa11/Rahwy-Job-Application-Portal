<?php 
    session_start();

    if (isset($_SESSION['username'])) {
    include 'db.php';

    if (isset($_POST['passwordOld']) && isset($_POST['passwordNew']) && isset($_POST['passwordConfirm'])) {

        $passwordOld = trim($_POST['passwordOld']);
        $passwordNew = trim($_POST['passwordNew']);
        $passwordConfirm = trim($_POST['passwordConfirm']);

        if($passwordNew !== $passwordConfirm){
            header("Location: changePassword.php?error=The confirmation password does not match");
            exit();

        }else {
            // hashing the password
            $passwordNewH = password_hash($passwordNew, PASSWORD_DEFAULT);

            $email = $_SESSION['username'];
            $sql = "SELECT * FROM user WHERE username='$email'";
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_assoc($result);

            $passwordHashDB = $row['password_hash'];
            if (password_verify($passwordOld, $passwordHashDB)) {
                
                $sql_2 = "UPDATE user SET password_hash = '$passwordNewH' WHERE username = '$email'";
                mysqli_query($conn, $sql_2);

                if(isset($_COOKIE['username']) && isset($_COOKIE["pw"])) {
                    $email = $_COOKIE["username"];
                    $password = $_COOKIE["pw"];
                    setcookie("username", $email, time() - 1);
                    setcookie("pw", $password, time() - 1);
                }
                session_destroy();
                
                echo "<script>alert('Password successfully changed, returning you to back to the Login page.');window.location='Login.php';</script>";
                exit();
    
            }else {
                header("Location:changePassword.php?error=Incorrect password entered");
                exit();
            }
    
        }
    }else{
        header("Location: changePassword.php");
        exit();
    }
    
    }else{
         header("Location: Login.php");
         exit();
    }
?>