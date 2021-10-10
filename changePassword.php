<?php 
    //session_start();

    if (isset($_SESSION['username'])) {

?>

<!DOCTYPE html>
<html>
    <head>
        <title>Change Password</title>
    </head>
    <body>
        <form action="changeP.php" method="post">
            <div>
                <h1>Change Password</h1>
                <?php if (isset($_GET['error'])) { ?>
                    <p class="error"><?php echo $_GET['error']; ?></p>
                <?php } ?>

                <label>Enter your old password</label><br />
                <input type="password" placeholder="Old Password" name="passwordOld" required><br /><br />

                <label>Enter your new password</label><br />
                <input type="password" placeholder="New Password" name="passwordNew" required><br /><br />

                <label>Please re-enter to confirm your new password</label><br />
                <input type="password" placeholder="Confirm Password" name="passwordConfirm" required><br /><br />

                <button type="submit">Change Password</button>
            </div>
        </form>
    </body>
</html>

<?php 
    }else{
        header("Location: Login.php");
        exit();
    }
?>