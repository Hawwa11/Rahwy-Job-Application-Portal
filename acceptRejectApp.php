<?php include("admin.php"); ?>

<script>
    document.getElementById('defaultOpen').style.backgroundColor = 'Blue'; 
</script>

<body>
<div id="ViewApplication" class="tabcontent">

    <?php
    include("db.php");

    $button = $_GET['button'];

    if ($button == 1) {
        if (isset($_POST['accept'])) {
            $update = mysqli_query($conn, "UPDATE form SET appStatus = 1 WHERE id='{$_POST['id']}'");

            if ($update) {
                echo "<script>alert('Successfully accepted application status! Returning you to back to the previous page.');window.location='viewApplication.php';</script>";
                exit();
            } else {
                echo 'Failed to accept record because ' . mysqli_error($conn);
            }
        }
    ?>
        <form action="" method="post">
            <input type="hidden" value="<?php echo $_REQUEST['id']; ?>" name="id">
            <table>
                <tr>
                    <?php echo '<td style="color: white;">Are you sure you want to accept Application ' .  $_REQUEST['id'] . '  ?</td>' ?>
                    <td><input type="submit" name="accept" value="Yes"><input type="button" value="Cancel" onclick="window.location='viewApplication.php'"></td>
                </tr>
            </table>
            <br />
        </form>
    <?php

    } else if ($button == 0) {
        if (isset($_POST['reject'])) {
            $update = mysqli_query($conn, "UPDATE form SET appStatus = 2 WHERE id='{$_POST['id']}'");

            if ($update) {
                echo "<script>alert('Successfully rejected application status! Returning you to back to the previous page.');window.location='viewApplication.php';</script>";
                exit();
            } else {
                echo 'Failed to reject because ' . mysqli_error($conn);
            }
        }
    ?>

    <form action="" method="post">
        <input type="hidden" value="<?php echo $_REQUEST['id']; ?>" name="id">
        <table>
            <tr>
                <?php echo '<td style="color: white;">Are you sure you want to reject Application ' .  $_REQUEST['id'] . '  ?</td>' ?>
                <td><input type="submit" name="reject" value="Yes"><input type="button" value="Cancel" onclick="window.location='viewApplication.php'"></td>
            </tr>
        </table>
        <br />
    </form>
    <?php
    }
    ?>
    
    <table border="1" style="width:85%; color: white; margin: auto;">
        <tr>
            <td>
                <!--Id-->
                <div>
                    <label for="id"><b>Application ID</b></label>
                </div>
            </td>

            <td>
                <!--Username-->
                <div>
                    <label for="username"><b>Username / Email</b></label>
                </div>
            </td>

            <td>
                <!--Fname-->
                <div>
                    <label for="fname"><b>Full Name</b></label>
                </div>
            </td>

            <td>
                <!--DOB-->
                <div>
                    <label for="dOB"><b>Date of Birth</b></label>
                </div>
            </td>

            <td>
                <!--FAddress-->
                <div>
                    <label for="fAddress"><b>Address</b></label>
                </div>
            </td>

            <td>
                <!--MartialStatus-->
                <div>
                    <label for="martialStatus"><b>Martial Status</b></label>
                </div>
            </td>

            <td>
                <!--JobType-->
                <div>
                    <label for="jobType"><b>Job Type</b></label>
                </div>
            </td>

            <td>
                <!--JobPosition-->
                <div>
                    <label for="jobPosition"><b>Job Position</b></label>
                </div>
            </td>

            <td>
                <!--ExpectedSalary-->
                <div>
                    <label for="expectedSalary"><b>Expected Salary</b></label>
                </div>
            </td>

            <td>
                <!--Enquiry-->
                <div>
                    <label for="enquiry"><b>Enquiry</b></label>
                </div>
            </td>

            <td>
                <!--Status-->
                <div>
                    <label for="appStatus"><b>Application Status</b></label>
                </div>
            </td>

            <td>
                <!--Apply_date-->
                <div>
                    <label for="apply_date"><b>Date Applied</b></label>
                </div>
            </td>
        </tr>
        <?php
        $query = mysqli_query($conn, "SELECT * FROM form WHERE id =" . $_GET['id']);
        while ($row = mysqli_fetch_array($query)) {
        ?>
            <tr>
                <td style=" text-align:right;">
                    <?php echo $row['id']; ?>
                </td>

                <td>
                    <?php echo $row['username']; ?>
                </td>

                <td>
                    <?php echo $row['fname']; ?>
                </td>

                <td>
                    <?php echo $row['dOB']; ?>
                </td>

                <td>
                    <?php echo $row['fAddress']; ?>
                </td>

                <td>
                    <?php echo $row['martialStatus']; ?>
                </td>

                <td>
                    <?php echo $row['jobType']; ?>
                </td>

                <td>
                    <?php echo $row['jobPosition']; ?>
                </td>

                <td style=" text-align:right;">
                    <?php echo '$' . $row['expectedSalary']; ?>
                </td>

                <td>
                    <?php echo $row['enquiry']; ?>
                </td>

                <td>
                    <?php
                    if ($row['appStatus'] == 0) {
                        echo 'Pending';
                    } else if ($row['appStatus'] == 1) {
                        echo 'Accepted';
                    } else {
                        echo 'Rejected';
                    }
                    ?>
                </td>

                <td>
                    <?php
                    $dateApplied = $row['apply_date'];
                    $dateApplied = date("d-m-Y");
                    echo $dateApplied;
                    ?>
                </td>
            </tr>
        <?php
        }
        ?>
    </table>
    </div>
    </body>