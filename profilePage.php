<?php
    include("db.php");//Includes the database file that makes the connection

    //fixes and error where session is ignored because an error has been already started
    if(!isset($_SESSION))//If statement to start a session if none was started
    { 
        session_start(); 
    }

    //Getting username of logged in user
    $username = $_SESSION['username'];//Saving the username from the session into a variable
    $query = mysqli_query($conn, "SELECT * FROM form WHERE username = '{$username}'");//Query to get all info related to logged in user and saving required info into variables
    while($row = mysqli_fetch_array($query)){
        $fn = $row['fname'];
        $dob = $row['dOB'];
        $maritalS = $row['martialStatus'];
        $address = $row['fAddress'];
    }

    //Updating the database
    if(isset($_POST['update'])){
        $maritalS = mysqli_real_escape_string($conn, $_POST['maritalS']);
        $address = mysqli_real_escape_string($conn, $_POST['address']);

        $update = mysqli_query($conn, "UPDATE form  SET martialStatus='$maritalS', fAddress='$address' WHERE username = '{$username}'");
            if($update){
                echo '<script>alert("Record Successfully edited")</script>';               
            } 
            else {
                echo 'Failed to edit record because '.mysqli_error($conn);
            }     
    }
?>

<form action="verifyEmail.php" method="POST">
<h1>Profile</h1>
<?php
$query = mysqli_query($conn, "SELECT * FROM form WHERE username = '{$username}'");
if (mysqli_num_rows($query)!=0)
{
?>
    <!--GENERAL INFO-->
    <!-- Name -->
    <div class="row">
      <div class="col-25">
        <label for="fname">Full Name</label>
      </div>
      <div class="col-75">
      <?php echo $fn; ?>
      </div>
    </div>

    <!--Email-->     
    <div class="row">
      <div class="col-25">
        <label for="fname">Email</label>
      </div>
      <div class="col-75">
            <input type="text" name="email" placeholder="email" value="<?php echo $username; ?>" required>
            <input type="submit" name="verify" value="Verify New Email">
      </div>
    </div>
</form>
<form action="" method="POST">
    <!--DOB-->
    <div class="row">
      <div class="col-25">
        <label for="dob">Date Of Birth</label>
      </div>
      <div class="col-75">
    <?php echo $dob; ?>
      </div>
    </div>

    <!-- Martial Status -->
    <div class="row">
      <div class="col-25">
        <label>Martial Status</label>
      </div>
      <div class="col-75">
            <!--Checks the marital statuse and displays it in a radio button based on the stored data-->
            <input type="radio" name="maritalS" <?php if($maritalS=="single") {echo "checked";}?> value="single">Single
            <input type="radio" name="maritalS" <?php if($maritalS=="married") {echo "checked";}?> value="married">Married
      </div>
    </div>

    <!-- Address -->
    <div class="row">
      <div class="col-25">
        <label for="fAddress">Address</label>
      </div>
      <div class="col-75">

        <textarea id="address" name="address" placeholder="" style="height:100px" required><?php echo $address; ?></textarea>
      </div>
    </div>

    <!-- Update button -->
    <div class="row">
    <div class="col-25">
      </div>
      <div class="col-75">
        <input type="submit" name="update" value="Update">
      </div>
    </div>
<?php
}
else {//Displayed to new users who haven't created a form yet
    echo "<h3>Please create a form first</h3>";
}
?>
</form>

<!--Form to diplay all forms submitted by the logged in use-->
<form action="" method="POST">
    <h1>Applications</h1>
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
    $applicationCounter = 1;//Variable to display the number of the application being displayed to user
    while($row = mysqli_fetch_array($query))//Displaying the all the result of the query in a table
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
        <?php 
        $imageURL = 'uploads/'.$row["coverLetter"];//Getting the saved file from a folder called uploads
        //A button that can be used by the user to display the file if it was an image
        echo '<input type="button" name="viewCover" onclick="window.location = \'viewImage.php?id=' . $row['id'] . '&button=0\'" value="View Cover Letter">' 
        ?>
    </td>

    <td>
        <?php 
        $imageURL = 'uploads/'.$row["cv"];//Getting the saved file from a folder called uploads
        //A button that can be used by the user to display the file if it was an image
        echo '<input type="button" name="viewCV" onclick="window.location = \'viewImage.php?id=' . $row['id'] . '&button=1\'" value="View CV">' 
        ?>
    </td>

    <td>
        <?php echo $row['enquiry']; ?>
    </td>

    <td>
        <?php
        //if statements to display the result of the application status 
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
    $applicationCounter++;//Incrementing the counter to display number of applications
    }
    ?>
</table>    
</form>