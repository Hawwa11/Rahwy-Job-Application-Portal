<?php 
  /* session_start();
  if (!isset($_SESSION['username'])) 
    header("Location: Login.php");
  else {   */
?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=<device-width>, initial-scale=1.0">
    <title>Admin</title>
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
  width: 50%;
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

#ViewApplication {background-color: #4d4dff;}
#ViewUser {background-color: #F08080;}
</style>
</head>
<body>
     <div style=" text-align:right;">
        <button type="button" onclick="window.location.href='logout.php'" class="logout">Logout</button>
     </div>
     <div id="logo" class="logo">
        <center><img src="images/logo.jpeg" width="30%" height="30%"> </center>
     </div>
    <button class="tablink" onclick="openPage('ViewApplication', this, 'blue')"id="defaultOpen">View Application</button> 
    <button class="tablink" onclick="openPage('ViewUser', this, 'red')">View User</button>
    
    <div id="ViewApplication" class="tabcontent">
      <?php include("viewApplication.php"); ?>
    </div>

    <div id="ViewUser" class="tabcontent">
    <?php include("viewUser.php"); ?>
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
    // }
?>