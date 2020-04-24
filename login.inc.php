<?php
    session_start();
    if(isset($_POST['submit'])){
        include_once 'config.php';
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $password = mysqli_real_escape_string($conn, $_POST['password']);
        //error handlers
        //check for empty fields
        if(empty($email) || empty($password)){
            echo "<script type='text/javascript'>
            alert('One or more fields are missing!');
            window.location= 'login.php';
            </script>";
            exit();
        } else {
            $sql = "SELECT * FROM `users` WHERE `email`='$email';";
            $result = mysqli_query($conn, $sql);
            $result_check = mysqli_num_rows($result);
            if ($result_check < 1) {
                echo "<script type='text/javascript'>
                alert('Login Error!');
                window.location= 'login.php';
                </script>";
                exit();
            } else {
                if ($row = mysqli_fetch_assoc($result)) {
                  if (password_verify($password, $row['password'])) {
                    $_SESSION['id'] = $row['id'];
                    $_SESSION['name'] = $row['name'];
                    $_SESSION['email'] = $row['email'];
                    $_SESSION['phone'] = $row['phone'];
                    $_SESSION['address'] = $row['address'];
                    $_SESSION['state'] = $row['state'];
                    $_SESSION['password'] = $row['password'];
                    header('Location: home.php');
                    exit();
                  } else {
                    echo "<script type='text/javascript'>
                      alert('Invalid Password!');
                      window.location= 'login.php';
                      </script>";
                      exit();
                  }
                }
            }
        }
    } else {
        header('Location: login.php');
        exit();
    }
