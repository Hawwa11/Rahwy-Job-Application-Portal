<?php include("admin.php"); ?>

<script>
    document.getElementById('defaultOpen2').style.backgroundColor = 'Red';
</script>

<body>
    <div id="ViewUser" class="tabcontent">
        <?php
            include("db.php");
            if (isset($_POST['delete'])) {
                $delete = mysqli_query($conn, "DELETE FROM user WHERE username='{$_POST['user']}'");
                $delete2 = mysqli_query($conn, "DELETE FROM form WHERE username='{$_POST['user']}'");

                if ($delete) {
                    echo "<script>alert('Successfully deleted user, returning you to back to the previous page.');window.location='viewUser.php';</script>";
                    exit();
                } else {
                    echo 'Failed to delete because ' . mysqli_error($conn);
                }
            } else if (isset($_POST['no'])) {
                echo "<script>alert('Operation cancelled, returning you to back to the previous page.');window.location='viewUser.php';</script>";
            }
        ?>

        <form action="" method="post">
            <input type="hidden" value="<?php echo $_REQUEST['user']; ?>" name="user">
            <table>
                <tr>
                    <?php echo '<td style="color: white;">All applications sent by this user will also be deleted.</td>' ?>
                </tr>
                <tr>
                    <?php echo '<td style="color: white;">Are you sure you want to delete this user?</td>' ?>
                    <td><input type="submit" name="delete" value="Yes">&nbsp&nbsp<input type="submit" name="no" value="no"></td>
                </tr>
            </table>
            <br />
        </form>

        <table border="1" style="width:75%; color: white; margin: auto;">
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
                        $rs = mysqli_query($conn, "SELECT COUNT(*) as count FROM user a INNER JOIN form b ON (a.username  = b.username )");
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