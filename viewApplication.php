<?php include("admin.php"); ?>

<script>
    document.getElementById('defaultOpen').style.backgroundColor = "purple"; 
</script>

<body >
    <?php include("db.php"); ?>
    <div id="ViewApplication" class="tabcontent">
        <table border="1" style="width:100%; margin: auto;">
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
                    <!--CoverLetter-->
                    <div>
                        <label for="coverLetter"><b>Cover Letter</b></label>
                    </div>
                </td>

                <td>
                    <!--CV-->
                    <div>
                        <label for="cv"><b>CV</b></label>
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

                <td>
                    <!--Accept / Reject Application-->
                    <div>
                        <label for="acceptRejectApp"><b>Accept / Reject Application</b></label>
                    </div>
                </td>
            </tr>
            <?php
                // To show data from form table
                $query = mysqli_query($conn, "SELECT * FROM form");
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

                    <td style="text-align: center;">
                        <!-- Clicking on the button will pass the form id -->
                        <?php echo '<input type="button" name="viewCover" onclick="window.location = \'viewImage.php?id=' . $row['id'] . '&button=0\'" value="View Cover Letter">' ?>
                    </td>

                    <td style="text-align: center;">
                        <!-- Clicking on the button will pass the form id -->
                        <?php echo '<input type="button" name="viewCV" onclick="window.location = \'viewImage.php?id=' . $row['id'] . '&button=1\'" value="View CV" >' ?>
                    </td>

                    <td>
                        <?php echo $row['enquiry']; ?>
                    </td>

                    <td>
                        <?php
                            // Application status depends on values in database
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
                            $dateApplied = date("d-m-Y"); // To format the date
                            echo $dateApplied;
                        ?>
                    </td>

                    <td>
                        <?php
                            // Some buttons will be disabled depending on the application status
                            // Clicking on a button will pass the form id
                            if ($row['appStatus'] == 1) {
                                echo '<input type="button" name="Accept" disabled value="Accept">&nbsp&nbsp&nbsp';
                                echo '<input type="button" name="Reject" onclick="window.location = \'acceptRejectApp.php?id=' . $row['id'] . '&button=0\'" value="Reject">';
                            } else if ($row['appStatus'] == 2) {
                                echo '<input type="button" name="Accept" onclick="window.location = \'acceptRejectApp.php?id=' . $row['id'] . '&button=1\'" value="Accept">&nbsp&nbsp&nbsp';
                                echo '<input type="button" name="Reject" disabled value="Reject">';
                            } else {
                                echo '<input type="button" name="Accept" onclick="window.location = \'acceptRejectApp.php?id=' . $row['id'] . '&button=1\'" value="Accept">&nbsp&nbsp&nbsp';
                                echo '<input type="button" name="Reject" onclick="window.location = \'acceptRejectApp.php?id=' . $row['id'] . '&button=0\'" value="Reject">';
                            }
                        ?>
                    </td>
                </tr>
            <?php
            }
            ?>
        </table>
    </div>
</body>