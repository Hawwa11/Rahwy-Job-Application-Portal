<!DOCTYPE html>
<html>

<head>
    <title>View Image</title>
    <style>
        .back {
            width: 125px;
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
    </style>
</head>

<body>
    <?php
        include("db.php");
    ?>
    <!-- Clicking on the button will redirect to previous page -->
    <button type="button" onclick="window.history.back();" class="back">
        < Back </button>
    <br />
    <br />
    <?php
        $sql = "SELECT * FROM form WHERE id = " . $_REQUEST['id']; // id value passed from previous page
        $result = mysqli_query($conn, $sql);
        $image = mysqli_fetch_array($result);
        $button = $_GET['button'];

        if ($button == 1) { // View CV
            $imageURL = 'uploads/' . $image['cv'];
            echo "<img src=" . $imageURL . " style='display: block; width: 85%; margin-left: auto; margin-right: auto;'/>";
        } else if ($button == 0) { // View Cover Letter
            $imageURL = 'uploads/' . $image['coverLetter'];
            echo "<img src=" . $imageURL . " style='display: block; width: 85%; margin-left: auto; margin-right: auto;'/>";
        }
    ?>