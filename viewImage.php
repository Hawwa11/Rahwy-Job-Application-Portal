<!DOCTYPE html>
<html>

<head>
    <title>View Image</title>
    <style>
        .back {
            background-color: #4d4dff;
            color: white;
            border: none;
            outline: none;
            cursor: pointer;
            padding: 12px;
            font-size: 17px;
            width: 125px;
        }
    </style>
</head>

<body>
    <?php
        include("db.php");
    ?>

    <button type="button" onclick="window.history.back();" class="back">
        < Back </button>
    <br />
    <br />
    <?php
        $sql = "SELECT * FROM form WHERE id = " . $_REQUEST['id'];
        $result = mysqli_query($conn, $sql);
        $image = mysqli_fetch_array($result);
        $button = $_GET['button'];

        if ($button == 1) {
            $imageURL = 'uploads/' . $image['cv'];
            echo "<img src=" . $imageURL . " style='display: block; width: 85%; margin-left: auto; margin-right: auto;'/>";
        } else if ($button == 0) {
            $imageURL = 'uploads/' . $image['coverLetter'];
            echo "<img src=" . $imageURL . " style='display: block; width: 85%; margin-left: auto; margin-right: auto;'/>";
        }
    ?>