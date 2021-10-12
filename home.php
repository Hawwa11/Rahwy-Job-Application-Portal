<?php
include("db.php");

$username = $_SESSION['username'];

//Create the application table if it doesnt exist
$sql = "CREATE TABLE IF NOT EXISTS form (
    id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    fname VARCHAR(30) NOT NULL,
    username VARCHAR(100) NOT NULL,
    FOREIGN KEY (username) REFERENCES user(username) ON DELETE CASCADE ON UPDATE CASCADE,
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
  $targetDir = "uploads/";
  $fileCV = basename($_FILES["cv"]["name"]);
  $targetFilePath = $targetDir . $fileCV;
  $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
  
  $fileCL = basename($_FILES["cl"]["name"]);
  $targetFilePath2 = $targetDir . $fileCL;
  $fileType = pathinfo($targetFilePath2,PATHINFO_EXTENSION);

  $allowTypes = array('jpg','png','jpeg','gif','pdf', 'PNG');
    if(in_array($fileType, $allowTypes)){

      move_uploaded_file($_FILES["cv"]["tmp_name"],$targetFilePath);
      move_uploaded_file($_FILES["cl"]["tmp_name"],$targetFilePath2);

	$fname = mysqli_real_escape_string($conn, $_POST['fname']);
	$expectedSalary = $_POST['es'];
	$cv = $fileCV;
	$martialStatus = mysqli_real_escape_string($conn, $_POST['ms']);
	$jobPosition = mysqli_real_escape_string($conn, json_encode($_POST['jp']));
	$enquiry = mysqli_real_escape_string($conn, $_POST['enquiry']);
	$coverLetter = $fileCL;
	$dOB = mysqli_real_escape_string($conn, $_POST['dob']);
	$jobType = mysqli_real_escape_string($conn, $_POST['jt']);
  $fAddress = mysqli_real_escape_string($conn, $_POST['fa']);
  $appStatus = 0;

	$insert = mysqli_query($conn, "INSERT INTO form (fname, username, expectedSalary, cv, martialStatus, jobPosition, enquiry, coverLetter, dOB, jobType, fAddress, appStatus)
   VALUES ('$fname','$username','$expectedSalary','$cv','$martialStatus','$jobPosition','$enquiry','$coverLetter','$dOB','$jobType','$fAddress','$appStatus')");
	

	if($insert){
		echo 'Successfully submitted the application!';
	} else {
		echo 'Failed to submit application due to '.mysqli_error($conn);
	}

  //to fetch file from the db
//   $query = mysqli_query($conn, "SELECT * FROM form");

//   if(mysqli_num_rows($query)!=0){

//     while($row = mysqli_fetch_array($query)){
//         $imageURL = 'uploads/'.$row["cv"];
//         echo "<img src=" . $imageURL . " />";      
// }

//   while($row = mysqli_fetch_array($query)){
//       $imageURL = 'uploads/'.$row["cl"];
//       echo "<img src=" . $imageURL . " />"; 
// }}else{echo "No image(s) found..."; } 
 }

else{
  $statusMsg = 'Sorry, only JPG, JPEG, PNG, GIF, & PDF files are allowed to upload.';
  echo $statusMsg;
}
}
  ?>



<html>   
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="formStyle.css">
</head>
<body>
<h1>Welcome!</h1>
<div class="container">
<h3>**Please fill in the following details in the job application form</h3><br>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data">
  <!-- Name -->
    <div class="row">
      <div class="col-25">
        <label for="fname">Full Name</label>
      </div>
      <div class="col-75">
        <input type="text" id="fname" name="fname" placeholder="" required>
      </div>
    </div>

    <!-- DOB -->
    <div class="row">
      <div class="col-25">
        <label for="dob">Date Of Birth</label>
      </div>
      <div class="col-75">
      <input type="date" name="dob" id="dob" style="height:40px" min="1950-01-01" required>
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
        <textarea id="fa" name="fa" placeholder="" style="height:100px" required></textarea>
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

    <!-- Cover Letter -->
    <div class="row">
      <div class="col-25">
        <label for="cl">Cover Letter</label>
      </div>
      <div class="col-75">
      <input type="file" name="cl" id="cl" required>
      </div>
    </div>

    <!-- CV -->
    <div class="row">
      <div class="col-25">
        <label for="cv">CV</label>
      </div>
      <div class="col-75">
      <input type="file" name="cv" id="cv" required>
      </div>
    </div>

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
      <input type="submit" name="submit" value="Submit">
    </div>
  </form>
</div>

</body>
</html>

 
   

