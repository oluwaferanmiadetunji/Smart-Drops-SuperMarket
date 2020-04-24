<?php
    include_once("config.php");

    if (isset($_POST['submit'])) {
        $id = $_POST['id'];
        $name = mysqli_real_escape_string($conn, $_POST['name']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $phone = mysqli_real_escape_string($conn, $_POST['phone']);
        $state = mysqli_real_escape_string($conn, $_POST['state']);
        $address = mysqli_real_escape_string($conn, $_POST['address']);


        if(empty($name) || empty($email) || empty($phone) || empty($state) || empty($address)) {
            echo "<script type='text/javascript'>
            alert('One or more fields are missing!');
            window.location= '../all.edit.users.php';
            </script>";
            exit();
        } else {
            $sql ="UPDATE users SET name='$name', email='$email', phone='$phone', state='$state', address='$address' WHERE id='$id';";
            mysqli_query($conn, $sql);
            echo "<script type='text/javascript'>
            alert('Account Updated!');
            window.location= '../home.php';
            </script>";
            exit();
        }
    } else {
        header('Location: ../home.php');
        exit();
    }
