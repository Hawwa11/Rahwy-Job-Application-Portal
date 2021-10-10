<?php
    include("db.php");

    //fixes and error where session is ignored because an error has been already started
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    }

    //Getting username of logged in user
    $username = $_SESSION['username'];
    $query = mysqli_query($conn, "SELECT * FROM form WHERE username = '{$username}'");
    while($row = mysqli_fetch_array($query)){
        $fn = $row['fname'];
        $email = $row['email'];
        $dob = $row['dOB'];
        $maritalS = $row['martialStatus'];
        $address = $row['fAddress'];
        /*$jobType = $row['jobType'];
        $jobPosition = $row['jobPosition'];
        $expectedSalary = $row['expectedSalary'];
        $coverLetter = $row['coverLetter'];
        $cv = $row['cv'];
        $enquiry = $row['enquiry'];*/
    }

    //Updating the database
    if(isset($_POST['update'])){
        $email2 = $_POST['email'];
        if(filter_var($email2, FILTER_VALIDATE_EMAIL) === false){
            echo 'Invalid email format';
        }
        else{
            //Will be used for the email verification
            createConfirmationmbox();
            
            $email2 = mysqli_real_escape_string($conn, $_POST['email']);
            $maritalS = mysqli_real_escape_string($conn, $_POST['maritalS']);
            $address = mysqli_real_escape_string($conn, $_POST['address']);

            //$update = mysqli_query($conn, "UPDATE form  SET email='$email2', martialStatus='$maritalS', fAddress='$address' WHERE username = '{$username}'");
            $update = mysqli_query($conn, "UPDATE user a INNER JOIN form b ON (a.username  = b.username )
            SET
            a.username  = '$email2',
            b.username = '$email2', email='$email2', martialStatus='$maritalS', fAddress='$address'
            WHERE a.username = '{$username}' AND b.username = '{$username}' ");

            if($update){
                //Session info is updated when an update is done to update the info being displayed
                $_SESSION['username'] = $email2;
                $username = $_SESSION['username'];
                $email=$email2;
                echo 'Successfully edit record.';
            } else {
                echo 'Failed to edit record because '.mysqli_error($conn);
            }
        }      
    }
?>

<form action="" method="POST">
<h1><u>Profile</u></h1>
    <!--GENERAL INFO-->
    <!--FirstName-->
    <div>
		<label for="fName"><b>Name: </b></label>
        <?php echo $fn; ?>
	</div>

    <!--Email-->
    <div>
		<label for="email"><b>Email: </b></label>
		<input type="text" name="email" placeholder="email" value="<?php echo $email; ?>" required>
	</div>

    <!--DOB-->
    <div>
		<label for="dob"><b>Date of Birth: </b></label>
		<?php echo $dob; ?>
	</div>

    <!--MaritalStatus-->
    <div>
		<label for="maritalS"><b>Marital Status: </b></label>
        <!--Checks the marital statuse and displays it in a radio button based on the stored data-->
        <input type="radio" name="maritalS" <?php if($maritalS=="single") {echo "checked";}?> value="single">Single
        <input type="radio" name="maritalS" <?php if($maritalS=="married") {echo "checked";}?> value="married">Married
	</div>

    <!--Address-->
    <div>
		<label for="address"><b>Address: </b></label>
		<input type="text" name="address" placeholder="Address" value="<?php echo $address; ?>" required>
	</div>
    <!--Update Button-->
    <div>
        <input type="submit" name="update" value="Update">
    </div>
    <br>

    <h1><u>Applications</u></h1>
<table border = "1">
    <!--APPLICATION RELATED INFO-->
    <!--JobType-->
    <tr>
        <td>
            <div>
                <label for="appNumber"><b>Application Number: </b></label>                
            </div>
        </td>

        <td>
            <div>
                <label for="jobType"><b>Job Type: </b></label>                
            </div>
        </td>

        <td>
            <!--JobPosition-->
            <div>
                <label for="jobPosition"><b>Job Position: </b></label>                
            </div>
        </td>

        <td>
            <!--ExpectedSalary-->
            <div>
                <label for="expectedSalary"><b>Expected Salary: </b></label>                
            </div>
        </td>

        <td>
            <!--CoverLetter-->
            <div>
                <label for="coverLetter"><b>Cover Letter: </b></label>                
            </div>
        </td>

        <td>
            <!--CV-->
            <div>
                <label for="cv"><b>CV: </b></label>                
            </div>
        </td>

        <td>
            <!--Enquiry-->
            <div>
                <label for="enquiry"><b>Enquiry: </b></label>                
            </div>
        </td>

        <td>
            <!--Status-->
            <div>
                <label for="appStatus"><b>Application Status: </b></label>                
            </div>
        </td>
</tr>
<?php
    $query = mysqli_query($conn, "SELECT * FROM form WHERE username = '{$username}'");
    $applicationCounter = 1;
    while($row = mysqli_fetch_array($query))
    {
?>
<tr>
    <td>
        <?php echo 'Application ' . $applicationCounter; ?>
    </td>

    <td>
        <?php echo $row['jobType']; ?>
    </td>

    <td>
        <?php echo $row['jobPosition']; ?>
    </td>

    <td>
        <?php echo $row['expectedSalary']; ?>
    </td>

    <td>
        <?php echo $row['coverLetter']; ?>
    </td>

    <td>
        <?php echo $row['cv']; ?>
    </td>

    <td>
        <?php echo $row['enquiry']; ?>
    </td>

    <td>
        <?php 
            if ($row['appStatus'] == 0){
                echo 'Pending';
            }
            else if ($row['appStatus'] == 1){
                echo 'Accepted';
            }
            else {
                echo 'Rejected';
            }
        ?>
    </td>
</tr>
<?php
    $applicationCounter++;
    }
    ?>
</table>    
</form>
<?php
    function  createConfirmationmbox(){
        echo '<script type="text/javascript"> ';
        echo 'var inputname = prompt("Please enter the verification code sent to your email:", "");';
        echo 'alert(vCode);';
        echo '</script>';
    }
?>