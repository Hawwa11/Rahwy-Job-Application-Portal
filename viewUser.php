<!DOCTYPE html>
<html>

<head>
    <title>View User</title>
</head>

<body>
    <?php
    include("db.php");
    ?>
    <table border="1">
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

                <td>
                    <?php echo '<input type="button" name="viewApplication" onclick="window.location = \'viewUserApplication.php?user=' . $row['username'] . '\'" value="View Application">' ?>
                </td>

                <td>
                    <?php echo '<input type="button" name="deleteUser" onclick="window.location = \'deleteUser.php?user=' . $row['username'] . '\'" value="Delete User">' ?>
                </td>
            </tr>
        <?php
        }
        ?>
    </table>
</body>