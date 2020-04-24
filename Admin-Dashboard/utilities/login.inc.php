<?php

    session_start();

    if(isset($_POST['submit'])){

        include_once 'config.php';

        $username = mysqli_real_escape_string($conn, $_POST['username']);
        $password = mysqli_real_escape_string($conn, $_POST['password']);

        //error handlers
        //check for empty fields
        if(empty($username) || empty($password)){
            echo "<script type='text/javascript'>
            alert('One or more fields are missing!');
            window.location= '../index.php';
            </script>";
            exit();
        } else {
            $sql = "SELECT * FROM `admin` WHERE `username`='$username';";
            $result = mysqli_query($conn, $sql);
            $result_check = mysqli_num_rows($result);
            if ($result_check < 1) {
                echo "<script type='text/javascript'>
                alert('Login Error!');
                window.location= '../index.php';
                </script>";
                exit();
            } else {
                if ($row = mysqli_fetch_assoc($result)) {
                    if ($password != $row['password']) {
                        echo "<script type='text/javascript'>
                        alert('Login Error!');
                        window.location= '../index.php';
                        </script>";
                        exit();
                    } elseif ($password == $row['password']) {
                        $_SESSION['username'] = $row['username'];
                        echo "<script type='text/javascript'>
                        window.location= '../home.php';
                        </script>";
                        exit();
                    }
                }
            }
        }
    } else {
        header('Location: ../index.php');
        exit();
    }
