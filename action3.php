<?php
    include("config.php");
    if(isset($_POST['action']) && isset($_POST['action']) == 'order') {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $address = $_POST['address'];
        $pickup = $_POST['pickup'];
        $pmode = $_POST['pmode'];
        $products = $_POST['products'];
        $total = $_POST['total'];
        $date = $_POST['date'];
        $order_id = $_POST['order_id'];
        $sql = "INSERT INTO orders (`id`, `name`, `email`, `address`, `phone`,`pickup`, `pmode`, `products`, `amount`, `date`, `order_id`) 
        VALUES (NULL, '$name', '$email', '$address', '$phone', '$pickup', '$pmode', '$products', '$total', '$date', '$order_id');";
        mysqli_query($conn, $sql);
        $sql1 = "DELETE FROM cart;";
        mysqli_query($conn, $sql1);
        echo $pmode;
    }