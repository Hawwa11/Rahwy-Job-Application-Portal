<?php 
    if (isset($_SESSION['username'])) {
?>

<!DOCTYPE html>
<html>
    <head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="formStyle.css">
    </head>
    <body>
    <div class="container">
        <form action="changeP.php" class="cpForm" method="post">
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
                      <input type="submit" name="submit" value="Change Password">
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