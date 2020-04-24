<?php
    include("config.php");
    $user = $_GET['user'];
    $sql = "SELECT * FROM cart WHERE user='$user';";
    $result = mysqli_query($conn, $sql);
    $resultcheck = mysqli_num_rows($result);
    echo $resultcheck;