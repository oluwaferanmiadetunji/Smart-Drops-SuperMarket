<?php
if(isset($_POST['submit'])){
    include_once 'config.php';
    $id = mysqli_real_escape_string($conn, $_POST['id']);
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $address = mysqli_real_escape_string($conn, $_POST['address']);
    $products = mysqli_real_escape_string($conn, $_POST['products']);
    $amount = mysqli_real_escape_string($conn, $_POST['amount']);
    $date = mysqli_real_escape_string($conn, $_POST['date']);
    
    $to = $email;
    $subject = "Smart Drops Supermarket & Boutique";


    $message = "
    <html>
        <head>
        <title>Smart Drops Supermarket & Boutique</title>
        </head>
        <body>
            <p>Your order has been received and is being processed!</p>
            <p>The details of your order are:</p>
            <ul style='list-style:none;'>
                <li>Name: ". $name . "</li>
                <li>Products: ".$products."</li>
                <li>Amount paid: &#8358;".$amount."</li>
                <li>Delivery Date: ".$date."</li>
            </ul>
            <p>Thanks for shopping with us!</p>
        </body>
    </html>
    ";

    // Always set content-type when sending HTML email
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

    mail($to,$subject,$message,$headers);
    $sql ="UPDATE orders SET `status`='processed' WHERE order_id='$id';";
    mysqli_query($conn, $sql);
    header('Location: ../orders.php');
    exit();
}
    
