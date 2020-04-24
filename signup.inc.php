<?php
    if(isset($_POST['submit'])){
        include_once 'config.php';
        $name = mysqli_real_escape_string($conn, $_POST['name']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $password = mysqli_real_escape_string($conn, $_POST['password']);
        $password_hash =  password_hash($password, PASSWORD_DEFAULT);

        //error handlers
        //check for empty fields
        if(empty($name) || empty($email) || empty($password) ){
            echo "<script type='text/javascript'>
            alert('Fields Empty!');
            window.location= 'register.php';
            </script>";
            exit();
        } else {
            $sql = "SELECT * FROM users WHERE email='$email';";
            $result = mysqli_query($conn, $sql);
            $result_check = mysqli_num_rows($result);
            if ($result_check > 0) {
                echo "<script type='text/javascript'>
                alert('Registration Error!');
                window.location= 'register.php';
                </script>";
                exit();
            } else {
                //insert the user into the database
                $sql = "INSERT INTO `users` (`name`, email, `password`) VALUES ('$name', '$email','$password_hash');";
                mysqli_query($conn, $sql);
                echo "<script type='text/javascript'>
                alert('Registration Successful!');
                window.location= 'login.php';
                </script>";
                exit();
            }
        }
    } else {
        header('Location: register.php');
        exit();
    }
