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
        $jobType = $row['jobType'];
        $jobPosition = $row['jobPosition'];
        $expectedSalary = $row['expectedSalary'];
        $coverLetter = $row['coverLetter'];
        $cv = $row['cv'];
        $enquiry = $row['enquiry'];
    }

    //Updating the database
    if(isset($_POST['update'])){
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $maritalS = mysqli_real_escape_string($conn, $_POST['maritalS']);
        $address = mysqli_real_escape_string($conn, $_POST['address']);

        $update = mysqli_query($conn, "UPDATE form  SET email='$email', martialStatus='$maritalS', fAddress='$address' WHERE username = '{$username}'");
        
        if($update){
            echo 'Successfully edit record.';
        } else {
            echo 'Failed to edit record because '.mysqli_error($conn);
        }
    }
?>

<form action="" method="POST">
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

    <!--JobType-->
    <div>
		<label for="jobType"><b>Job Type: </b></label>
		<?php echo $jobType; ?>
	</div>

    <!--JobPosition-->
    <div>
		<label for="jobPosition"><b>Job Position: </b></label>
		<?php echo $jobPosition; ?>
	</div>

    <!--ExpectedSalary-->
    <div>
		<label for="expectedSalary"><b>Expected Salary: </b></label>
		<?php echo $expectedSalary; ?>
	</div>

    <!--CoverLetter-->
    <div>
		<label for="coverLetter"><b>Cover Letter: </b></label>
		<?php echo $coverLetter; ?>
	</div>

    <!--CV-->
    <div>
		<label for="cv"><b>CV: </b></label>
		<?php echo $cv; ?>
	</div>

    <!--Enquiry-->
    <div>
		<label for="enquiry"><b>Enquiry: </b></label>
		<?php echo $enquiry; ?>
	</div>
    <!--Update Button-->
    <div>
        <input type="submit" name="update" value="Update">
    </div>
</form>