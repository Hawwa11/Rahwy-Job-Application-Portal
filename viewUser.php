<?php include("admin.php"); ?>

<script>
    document.getElementById('defaultOpen2').style.backgroundColor = 'Red';
</script>

<body>
    <?php include("db.php"); ?>
    <div id="ViewUser" class="tabcontent">
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
                        $rs = mysqli_query($conn, "SELECT COUNT(*) as count FROM user a INNER JOIN form b ON (a.username  = b.username )");
                        $result = mysqli_fetch_array($rs);
                        echo $result['count'];
                        ?>
                    </td>

                    <td style="text-align: center;">
                        <?php echo '<input type="button" name="viewApplication" onclick="window.location = \'viewUserApplication.php?user=' . $row['username'] . '\'" value="View Application" style="width:60%;">' ?>
                    </td>

                    <td style="text-align: center;">
                        <?php echo '<input type="button" name="deleteUser" onclick="window.location = \'deleteUser.php?user=' . $row['username'] . '\'" value="Delete User" style="width:60%;">' ?>
                    </td>
                </tr>
            <?php
            }
            ?>
        </table>
    </div>
</body>