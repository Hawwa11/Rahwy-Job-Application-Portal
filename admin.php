<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=<device-width>, initial-scale=1.0">
    <title>Admin</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        * {
            box-sizing: border-box
        }

        /* Set height of body and the document to 100% */
        body,
        html {
            height: 100%;
            margin: 0;
            font-family: Arial;
        }

        .logo {
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
            width: 100%;
            padding: 75px 20px;
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

        #ViewApplication {
            background-color: #4d4dff;
        }

        #ViewUser {
            background-color: #F08080;
        }
    </style>
</head>
<header>
    <div style=" text-align:right;">
        <button type="button" onclick="window.location.href='logout.php'" class="logout">Logout</button>
    </div>
    <div id="logo" class="logo">
        <center><img src="images/logo.jpeg" width="30%" height="30%"> </center>
    </div>
    <button class="tablink" onclick="window.location.href='viewApplication.php'" id="defaultOpen">View Application</button>
    <button class="tablink" onclick="window.location.href='viewUser.php'" id="defaultOpen2">View User</button>
</header>