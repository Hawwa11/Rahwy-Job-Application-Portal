<?php 
include ("db.php");
  session_start();
  if (!isset($_SESSION['username'])) 
    header("Location: Login.php");
  else {  
?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=<device-width>, initial-scale=1.0">
    <title>Document</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
<style>
* {box-sizing: border-box}

/* Set height of body and the document to 100% */
body, html {
  height: 100%;
  margin: 0;
  font-family: Arial;
}

.logo{
  background-color: white;
  width: 100%;
}

/* Style tab links */
.tablink {
  background-color: #555;
  color: white;
  float: left;
  border: none;
  outline: none;
  cursor: pointer;
  padding: 14px 16px;
  font-size: 17px;
  width: 25%;
}

.tablink:hover {
  background-color: #777;
}

/* Style the tab content (and add height:100% for full page content) */
.tabcontent {
  color: white;
  display: none;
  padding: 100px 20px;
}

.logout {
  background-color: #4d4dff;
  color: white;
  border: none;
  outline: none;
  cursor: pointer;
  padding: 12px;
  font-size: 17px;
  width: 125px;
}
.success {background-color: #04AA6D;} /* Green */
.info {background-color: #2196F3;} /* Blue */
.danger {background-color: #f44336;} /* Red */ 

#Home {background-color: #4d4dff;}
#Profile {background-color: #F08080;}
#ChangePassword {background-color: #ffc966;}
#AboutUs {background-color: #66ff66;}
</style>
</head>
<body>

<?php
   /* $username = $_SESSION['username'];
    $query = mysqli_query($conn, "SELECT appStatus FROM form WHERE username = '{$username}'");
    if (mysqli_num_rows($query)=="0"){
        $status="Pending";
    }else if(mysqli_num_rows($query)=="1"){
        $status="Accepted";
    }else if(mysqli_num_rows($query)=="2"){
      $status="Rejected";
    }*/

    // $username = $_SESSION['username'];
    // $query = mysqli_query($conn, "SELECT appStatus FROM form WHERE username = '{$username}'");
    // while($row = mysqli_fetch_array($query)){
    //     $st = $row['appStatus'];
    // }
    
?>
     <div style=" text-align:right;">
        <button type="button" onclick="window.location.href='logout.php'" class="logout">Logout</button>
        <!-- Status:
          <?php 
  //         if ($st==0){
  //     $status="Pending";
  //     echo "<lable id='stat' class='info'>Pending</label>";
  // }else if($st==1){
  //     $status="Accepted";
  //     echo "<lable id='stat' class='success'>Accepted</label>";
  // }else if($st==2){
  //   $status="Rejected";
  //   echo "<lable id='stat' class='danger'>Rejected</label>";
  // }
  ?>
        </lable> -->
     </div>
     <div id="logo" class="logo">
        <center><img src="images/logo.jpeg" width="30%" height="30%"> </center>
     </div>
    <button class="tablink" onclick="openPage('Home', this, 'blue')"id="defaultOpen">Home</button> 
    <button class="tablink" onclick="openPage('Profile', this, 'red')">Profile</button>
    <button class="tablink" onclick="openPage('ChangePassword', this, 'orange')">Change Password</button>
    <button class="tablink" onclick="openPage('AboutUs', this, 'green')">About Us</button>
    
    <div id="Home" class="tabcontent">
      <?php include("home.php"); ?>
    </div>

    <div id="AboutUs" class="tabcontent">
      <p>hello</p>
     <!-- <?php include("aboutUs.php"); ?> -->
    </div>
    
    <div id="Profile" class="tabcontent">
      <?php include("profilePage.php"); ?>
      
    </div>
    
    <div id="ChangePassword" class="tabcontent">
      <?php include("changePassword.php"); ?>
    </div> 


    <script>
        function openPage(pageName,elmnt,color) {
          var i, tabcontent, tablinks;
          tabcontent = document.getElementsByClassName("tabcontent");
          for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
          }
          tablinks = document.getElementsByClassName("tablink");
          for (i = 0; i < tablinks.length; i++) {
            tablinks[i].style.backgroundColor = "";
          }
          document.getElementById(pageName).style.display = "block";
          elmnt.style.backgroundColor = color;
        }
        
        // Get the element with id="defaultOpen" and click on it
        document.getElementById("defaultOpen").click();
        </script>
   
</body>
<?php 
    }

?>