<?php
    include("db.php");

    $sql = "SELECT * FROM form WHERE id = 8"; 
    $result = mysqli_query($conn, $sql);
    $image = mysqli_fetch_array($result);
    echo '<img src="data:'.$image['coverLetterType'].';base64,'.base64_encode( $image['coverLetter'] ).'"/>';
?>