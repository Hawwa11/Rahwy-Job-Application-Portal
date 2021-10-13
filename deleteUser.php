<?php include("admin.php"); ?>

<script>
    document.getElementById('defaultOpen2').style.backgroundColor = 'purple';
</script>

<body>
    <div id="ViewUser" class="tabcontent">
        <?php
            include("db.php");
            if (isset($_POST['delete'])) { // if Yes button is clicked
                // delete user and form that has contains the username passed
                $delete = mysqli_query($conn, "DELETE FROM user WHERE username='{$_POST['user']}'");
                $delete2 = mysqli_query($conn, "DELETE FROM form WHERE username='{$_POST['user']}'");

                if ($delete) {
                    echo "<script>alert('Successfully deleted user, returning you to back to the previous page.');window.location='viewUser.php';</script>";
                    exit();
                } else {
                    echo 'Failed to delete because ' . mysqli_error($conn);
                }
            } else if (isset($_POST['no'])) { // if No button is clicked
                echo "<script>alert('Operation cancelled, returning you to back to the previous page.');window.location='viewUser.php';</script>";
            }
        ?>

        <form action="" method="post">
            <input type="hidden" value="<?php echo $_REQUEST['user']; ?>" name="user">
            <table>
                <tr>
                    <?php echo '<td>All applications sent by this user will also be deleted.</td>' ?>
                </tr>
                <tr>
                    <?php echo '<td>Are you sure you want to delete this user?</td>' ?>
                    <td><input type="submit" name="delete" value="Yes">&nbsp&nbsp<input type="submit" name="no" value="no"></td>
                </tr>
            </table>
            <br />
        </form>

        <table border="1" style="width:50%; margin: auto;">
            <tr>
                <td>
                    <!--Username-->
                    <div>
                        <label for="username"><b>Username / Email</b></label>
                    </div>
                </td>

                <td>
                    <!--Phone-->
                    <div>
                        <label for="phone"><b>Phone Number</b></label>
                    </div>
                </td>

                <td>
                    <!--countApplication-->
                    <div>
                        <label for="countApplication"><b>No. of Applications</b></label>
                    </div>
                </td>
            </tr>
            <?php
                $user = $_GET['user'];
                // To show data from form table from username based on user selected
                $select = "SELECT * FROM user WHERE username='$user'";
                $query = mysqli_query($conn, $select);
                while ($row = mysqli_fetch_array($query)) {
            ?>
                <tr>
                    <td>
                        <?php echo $row['username']; ?>
                    </td>

                    <td style=" text-align:right;">
                        <?php echo $row['phone']; ?>
                    </td>

                    <td style=" text-align:right;">
                    <?php 
                        $username = $row['username'];
                        // Count number of forms the user has submitted
                        $select = "SELECT COUNT(*) as count FROM form WHERE username='$username'";
                        $rs = mysqli_query($conn, $select);
                        $result = mysqli_fetch_array($rs);
                        echo $result['count'];
                    ?>
                    </td>
                </tr>
            <?php
            }
            ?>
        </table>
    </div>
</body>