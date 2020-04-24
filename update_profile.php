<?php
    include_once("config.php");

    if (isset($_POST['submit'])) {
        $id = mysqli_real_escape_string($conn, $_POST['id']);
        $name = mysqli_real_escape_string($conn, $_POST['name']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $phone = mysqli_real_escape_string($conn, $_POST['phone']);
        $address = mysqli_real_escape_string($conn, $_POST['address']);


        if(empty($name) || empty($email) || empty($phone) || empty($address)) {
            echo "<script type='text/javascript'>
            alert('One or more fields are missing!');
            window.location= 'profile.php';
            </script>";
            exit();
        } else {
            $sql ="UPDATE users SET name='$name', email='$email', phone='$phone', address='$address' WHERE id='$id';";
            mysqli_query($conn, $sql);
            echo "<script type='text/javascript'>
            alert('Account Updated!');
            window.location= 'profile.php';
            </script>";
            exit();
        }
    } else {
        header('Location: home.php');
        exit();
    }
