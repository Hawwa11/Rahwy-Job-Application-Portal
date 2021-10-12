<?php 
    if (isset($_SESSION['username'])) {

      include 'db.php';

    if (isset($_POST['passwordOld']) && isset($_POST['passwordNew']) && isset($_POST['passwordConfirm'])) {

        $passwordOld = trim($_POST['passwordOld']);
        $passwordNew = trim($_POST['passwordNew']);
        $passwordConfirm = trim($_POST['passwordConfirm']);

        if($passwordNew != $passwordConfirm){
            echo "The confirmation password does not match";

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
                session_destroy();

                echo "<script>alert('Password successfully changed, returning you to back to the Login page.');window.location.href='Login.php?cp=1';</script>";
            }else {
                echo "Incorrect password entered";
            }
    
        }
    }
?>

<!DOCTYPE html>
<html>
    <head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="formStyle.css">
    </head>
    <body>
    <div class="container">
        <form action="" class="cpForm" method="post">
            <div>
                <h1>Change Password</h1>
                <?php if (isset($_GET['error'])) { ?>
                    <p class="error"><?php echo $_GET['error']; ?></p>
                <?php } ?>

                <!-- Old Password -->
                   <div class="row">
                     <div class="col-25">
                       <label>Old password</label>
                     </div>
                     <div class="col-75">
                       <input type="password" placeholder="Enter your old password" name="passwordOld" required>
                     </div>
                    </div>

                <!-- New Password -->
                    <div class="row">
                     <div class="col-25">
                       <label>New password</label>
                     </div>
                     <div class="col-75">
                       <input type="password" placeholder="Enter your new password" name="passwordNew" required> 
                     </div>
                    </div>

                <!-- Confirm New Password -->
                    <div class="row">
                     <div class="col-25">
                       <label>Confirm New Password</label>
                     </div>
                     <div class="col-75">
                       <input type="password" placeholder="Please re-enter to confirm your new password" name="passwordConfirm" required>
                     </div>
                   </div>

                   <div class="row">
                      <input type="submit" name="cp" value="Change Password">
                   </div>
            </div>
        </form>
                </div>
    </body>
</html>

<?php 
    }else{
        header("Location: Login.php");
        exit();
    }
?>