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
            background-color: #505050;
            color: whitesmoke;
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
            color: black;
            width: 100%;
            padding: 100px 20px;
        }

        .bn27 {
            width: 100%;
            padding: 10px 13px;
            cursor: pointer;
            display: block;
            text-align: center;
            font-size: 1.0rem;
            background: linear-gradient(to right, #2a2966, #a84392);
            border: 0;
            outline: none;
            border-radius: 5px;
            color: white;
            cursor: pointer;
            transition: 0.3s;
        }

        .inner{
            margin-top: 10px;
            margin-right: 10px;
            display:inline-block;
            float: right;
        }

        #ViewApplication {
            background-color: #f2f2f2;
        }

        #ViewUser {
            background-color: #f2f2f2;
        }
    </style>
</head>
<header>
    <div class="inner">
        <button type="button" onclick="window.location.href='logout.php'" class="bn27">Logout</button>
    </div>
    <div id="logo" class="logo">
        <center><img src="images/logo.jpeg" width="30%" height="30%"> </center>
    </div>
    <button class="tablink" onclick="window.location.href='viewApplication.php'" id="defaultOpen">View Application</button>
    <button class="tablink" onclick="window.location.href='viewUser.php'" id="defaultOpen2">View User</button>
</header>