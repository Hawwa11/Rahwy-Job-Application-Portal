<!DOCTYPE html>
<html>

<head>
    <title>View Image</title>
</head>

<body>
    <?php
        include("db.php");
    ?>
    <button type="button" onclick="window.history.back();">
        < Back
    </button>
    <br />
    <br />
    <?php
        $sql = "SELECT * FROM form WHERE id = " . $_REQUEST['id'];
        $result = mysqli_query($conn, $sql);
        $image = mysqli_fetch_array($result);
        $button = $_GET['button'];

        if ($button == 1) {
            echo '<img src="data:;base64,' . base64_encode($image['cv']) . '" style="width: 85%;"/>';
        } else if ($button == 0) {
            echo '<img src="data:;base64,' . base64_encode($image['coverLetter']) . '" style="width: 85%;"/>';
        }
    ?>