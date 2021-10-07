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

#Home {background-color: #4d4dff;}
#AppplicationStatus {background-color: #F08080;}
#EditProfile {background-color: #ffc966;}
#ChangePassword {background-color: #66ff66;}
</style>
</head>
<body>
     <div id="logo" class="logo">
        <center><img src="images/logo.jpeg" width="30%" height="30%"> </center>
     </div>
    <button class="tablink" onclick="openPage('Home', this, 'blue')"id="defaultOpen">Home</button> 
    <button class="tablink" onclick="openPage('AppplicationStatus', this, 'red')">Appplication Status</button>
    <button class="tablink" onclick="openPage('EditProfile', this, 'orange')">Edit Profile</button>
    <button class="tablink" onclick="openPage('ChangePassword', this, 'green')">Change Password</button>
    
    <div id="Home" class="tabcontent">
      <?php include("home.php"); ?>
    </div>

    <div id="AppplicationStatus" class="tabcontent">
      <h3>Appplication Status</h3>
      
    </div>
    
    <div id="EditProfile" class="tabcontent">
      <h3>Edit Profile</h3>
      
    </div>
    
    <div id="ChangePassword" class="tabcontent">
      <h3>Change Password</h3>
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
