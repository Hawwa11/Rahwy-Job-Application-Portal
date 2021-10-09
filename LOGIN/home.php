<?php
include("db.php");
// $servername = "localhost";
// $username = "root";
// $password = "";
// $conn = new mysqli($servername,$username,$password,"rahwy2");
session_start();
$username = "yooooooo";

//Create the application table if it doesnt exist
$sql = "CREATE TABLE IF NOT EXISTS form (
    id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    fname VARCHAR(30) NOT NULL,
    email VARCHAR(40) NOT NULL,
    username VARCHAR(100) NOT NULL,
    FOREIGN KEY (username) REFERENCES user(username),
    expectedSalary INT(11) NOT NULL,
    cv MEDIUMBLOB NOT NULL,
    martialStatus VARCHAR(15) NOT NULL,
    jobPosition VARCHAR(30) NOT NULL,
    enquiry TEXT,
    coverLetter MEDIUMBLOB NOT NULL,
    dOB DATE NOT NULL,
    jobType VARCHAR(15) NOT NULL,
    fAddress VARCHAR(40) NOT NULL,
    appStatus INT(11) NOT NULL,
    apply_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    )";
    if ($conn->query($sql) === TRUE) {

    } else {
      echo "Error creating table: " . $conn->error;
    }

if(isset($_POST['submit'])){

	$fname = mysqli_real_escape_string($mysqli, $_POST['fname']);
	$email = mysqli_real_escape_string($mysqli, $_POST['email']);
	$expectedSalary = mysqli_real_escape_string($mysqli, $_POST['es']);
	$cv = mysqli_real_escape_string($mysqli, $_POST['cv']);
	$martialStatus = mysqli_real_escape_string($mysqli, $_POST['ms']);
	$jobPosition = mysqli_real_escape_string($mysqli, $_POST['jp']);
	$enquiry = mysqli_real_escape_string($mysqli, $_POST['enquiry']);
	$coverLetter = mysqli_real_escape_string($mysqli, $_POST['cl']);
	$dOB = mysqli_real_escape_string($mysqli, $_POST['dob']);
	$jobType = mysqli_real_escape_string($mysqli, $_POST['jt']);
  $fAddress = mysqli_real_escape_string($mysqli, $_POST['fa']);
  $appStatus = 0;
	
	$insert = mysqli_query($mysqli, "INSERT INTO form (fname, email, username, expectedSalary, martialStatus, jobPosition, enquiry, dOB, jobType, fAddress, appStatus)
    VALUES ($fname','$email','$username','$expectedSalary','$cv','$martialStatus','$jobPosition','$enquiry','$coverLetter','$dOB','$jobType','$fAddress','$appStatus)");
	
	if($insert){
		echo 'Successfully submitted the application!';
	} else {
		echo 'Failed to submit application due to '.mysqli_error($mysqli);
	}
	
}

?>
<html>   
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
* {
  box-sizing: border-box;
}

input[type=text], select, textarea {
  width: 100%;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 4px;
  resize: vertical;
}

label {
  padding: 12px 12px 12px 0;
  display: inline-block;
}

input[type=submit] {
  background-color: #04AA6D;
  color: white;
  padding: 12px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  float: right;
}

input[type=submit]:hover {
  background-color: #45a049;
}

.container {
  border-radius: 5px;
  
  padding: 20px;
}

.col-25 {
  float: left;
  width: 25%;
  margin-top: 10px;
  margin-left: 4%;
}

.col-75 {
  float: left;
  width: 50%;
  margin-top: 10px;
}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}

/* Responsive layout - when the screen is less than 600px wide, make the two columns stack on top of each other instead of next to each other */
@media screen and (max-width: 600px) {
  .col-25, .col-75, input[type=submit] {
    width: 100%;
    margin-top: 0;
  }
}
</style>
</head>
<body>
<h1>Welcome <?php echo $username .'!';?></h1>
<div class="container">
<h3>**Please fill in the following details in the job application form</h3><br>
<form action="home.php" method="POST">
  <!-- Name -->
    <div class="row">
      <div class="col-25">
        <label for="fname">First Name</label>
      </div>
      <div class="col-75">
        <input type="text" id="fname" name="fname" placeholder="" required>
      </div>
    </div>

    <!-- Email -->
    <div class="row">
      <div class="col-25">
        <label for="fname">Email</label>
      </div>
      <div class="col-75">
        <input type="text" id="email" name="email" placeholder="" required>
      </div>
    </div>


    <!-- DOB -->
    <div class="row">
      <div class="col-25">
        <label for="dob">Date Of Birth</label>
      </div>
      <div class="col-75">
      <input type="date" name="dob" id="dob" style="height:40px" min="2020-01-01" required>
      </div>
    </div>

    <!-- Martial Status -->
    <div class="row">
      <div class="col-25">
        <label>Martial Status</label>
      </div>
      <div class="col-75">
      <input type="radio" name="ms" id="ms" value="single">
      <label for="male">Single</label>
      <input type="radio" name="ms" id="ms" value="married">
      <label for="female">Married</label>
      </div>
    </div>

    <!-- Address -->
    <div class="row">
      <div class="col-25">
        <label for="fAddress">Address</label>
      </div>
      <div class="col-75">
        <textarea id="fa" name="fa" placeholder="" style="height:100px"></textarea>
      </div>
    </div>

    <!-- Job Type -->
    <div class="row">
      <div class="col-25">
        <label for="jt">Job Type</label>
      </div>
      <div class="col-75">
        <select id="jt" name="jt">
          <option value="HR Deparment">HR Deparment</option>
          <option value="Frontend Developer">Frontend Developer</option>
          <option value="Backend Developer">Backend Developer</option>
          <option value="System Analyst">System Analyst</option>
          <option value="Network Engineer">Network Engineer</option>
          <option value="Cloud Architect">Cloud Architect</option>
        </select>
      </div>
    </div>

    <!-- Job Position -------------------------------->
    <div class="row">
      <div class="col-25">
        <label for="jp">Job Position</label>
      </div>
      <div class="col-75">
            <input type="checkbox" name="jp[]" id="jp" value="Senior">
            <label>Senior</label>
            <input type="checkbox" name="jp[]" id="jp" value="Junior">
            <label>Junior</label>
            <input type="checkbox" name="jp[]" id="jp" value="Intern">
            <label>Intern</label>
      </div>
    </div>


    <!-- Expected Salary -------------------------------- -->
    <div class="row">
      <div class="col-25">
        <label for="es">Expected Salary</label>
      </div>
      <div class="col-75">
        <input type="text" id="es" name="es" placeholder="" required style="width:100px">
      </div>
    </div>
<!-- 
    <!-- Cover Letter -->
   <!--  <div class="row">
      <div class="col-25">
        <label for="cl">Cover Letter</label>
      </div>
      <div class="col-75">
      <input type="file" name="cl" id="cl" required>
      </div>
    </div> -->

    <!-- CV -->
    <!-- <div class="row">
      <div class="col-25">
        <label for="cv">CV</label>
      </div>
      <div class="col-75">
      <input type="file" name="cv" id="cv" required>
      </div> -->
    </div> -->

    <!-- Enquiry -->
    <div class="row">
      <div class="col-25">
        <label for="enquiry">Enquiry</label>
      </div>
      <div class="col-75">
        <textarea id="enquiry" name="enquiry" placeholder="" style="height:200px"></textarea>
      </div>
    </div>


    <div class="row">
      <input type="submit" value="Submit">
    </div>
  </form>
</div>

</body>
</html>

 