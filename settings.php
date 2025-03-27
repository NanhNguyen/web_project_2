<?php
    $host = "feenix-mariadb.swin.edu.au";
    $user = "s105550018";
    $pwd = "Namanhb52";
    $sql_db = "s105550018_db";

    $conn = mysqli_connect($host, $user, $pwd, $sql_db);

    if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
    }

    

    ?>