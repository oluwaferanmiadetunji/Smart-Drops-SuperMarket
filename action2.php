<?php
    include("config.php");
    if(isset($_POST['qty'])) {
        $qty = $_POST['qty'];
        $pid = $_POST['pid'];
        $pprice = $_POST['pprice'];
        $tprice = $qty * $pprice;
        $sql = "UPDATE cart SET quantity='$qty', total_price='$tprice' WHERE id='$pid';";
        mysqli_query($conn, $sql);
    }