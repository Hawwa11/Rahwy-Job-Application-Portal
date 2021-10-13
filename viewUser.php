<?php include("admin.php"); ?>

<script>
    document.getElementById('defaultOpen2').style.backgroundColor = 'purple';
</script>

<body>
    <?php include("db.php"); ?>
    <div id="ViewUser" class="tabcontent">
        <table border="1" style="width:75%; margin: auto;">
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

                <td>
                    <!--ViewApplication-->
                    <div>
                        <label for="viewApplication"><b>View Applications?</b></label>
                    </div>
                </td>

                <td>
                    <!--DeleteUser-->
                    <div>
                        <label for="deleteUser"><b>Delete User?</b></label>
                    </div>
                </td>
            </tr>
            <?php
                // To show data from form table only from user and not admin
                $query = mysqli_query($conn, "SELECT * FROM user WHERE user_role=0");
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

                    <td style="text-align: center;">
                        <!-- Clicking on the button will pass the user username -->
                        <?php echo '<input type="button" name="viewApplication" onclick="window.location = \'viewUserApplication.php?user=' . $row['username'] . '\'" value="View Application" style="width:150px;">' ?>
                    </td>

                    <td style="text-align: center;">
                        <!-- Clicking on the button will pass the user username -->
                        <?php echo '<input type="button" name="deleteUser" onclick="window.location = \'deleteUser.php?user=' . $row['username'] . '\'" value="Delete User" style="width:100px;">' ?>
                    </td>
                </tr>
            <?php
            }
            ?>
        </table>
    </div>
</body>