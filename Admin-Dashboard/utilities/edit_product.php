<?php
    include_once("config.php");

    if (isset($_POST['submit'])) {
        $id = $_POST['id'];
        $product_name = mysqli_real_escape_string($conn, $_POST['product_name']);
        $category = mysqli_real_escape_string($conn, $_POST['category']);
        $price = mysqli_real_escape_string($conn, $_POST['price']);
        //$image = mysqli_real_escape_string($conn, $_POST['image']);
        echo $id.$product_name.$category.$price;

        if( empty($product_name) || empty($category) || empty($price) ) {
            echo "<script type='text/javascript'>
            alert('One or more fields are missing!');
            window.location= '../products.php';
            </script>";
            exit();
        } else {
            $sql = "UPDATE `products` SET `product_name` = '$product_name', `product_price` = '$price', `category` = '$category' WHERE `product_id` = '$id';";
            mysqli_query($conn, $sql);
            echo "<script type='text/javascript'>
            alert('Product Updated!');
            window.location= '../products.php';
            </script>";
            exit();
        }
    } else {
        header('Location: ../products.php');
        exit();
    }
