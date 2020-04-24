<?php
    if(isset($_POST['submit'])){
        include_once 'config.php';
        $product_name = mysqli_real_escape_string($conn, $_POST['product_name']);
        $category = mysqli_real_escape_string($conn, $_POST['category']);
        $price = mysqli_real_escape_string($conn, $_POST['price']);
        $file = $_FILES['file'];
        $fileName = $_FILES['file']['name'];
        $fileTmpName = $_FILES['file']['tmp_name'];
        $fileSize = $_FILES['file']['size'];
        $fileError = $_FILES['file']['error'];
        $fileType = $_FILES['file']['type'];
        $fileExt = explode('.', $fileName);
        $fileActualExt = strtolower(end($fileExt));
        $allowed = array('jpg', 'jpeg', 'png');
        $pcode = uniqid();



        if( empty($product_name) || empty($category) || empty($price) ){
            echo "<script type='text/javascript'>
            alert('Fields Empty!');
            window.location= '../add.product.php';
            </script>";
            exit();
        } else {
            $sql = "SELECT * FROM products WHERE product_name='$product_name';";
            $result = mysqli_query($conn, $sql);
            $result_check = mysqli_num_rows($result);
            if ($result_check > 0) {
                echo "<script type='text/javascript'>
                alert('That product has already been added!');
                window.location= '../products.php';
                </script>";
                exit();
            } else {
                if (in_array($fileActualExt, $allowed)){
                    if($fileError === 0) {
                        if($fileSize <10000000 ){
                            $fileNameNew = uniqid('', true).".".$fileActualExt;
                            $fileDestination = '../../img/product/'.$fileNameNew;
                            move_uploaded_file($fileTmpName, $fileDestination);
                            $sql = "INSERT INTO `products` (`id`, `product_name`, `product_price`, `product_image`, `product_id`, `category`) VALUES (null, '$product_name', '$price', '$fileNameNew', '$pcode', '$category');";
                            mysqli_query($conn, $sql);
                            echo "<script type='text/javascript'>
                            alert('Product added!');
                            window.location= '../products.php';
                            </script>";
                            exit();
                        } else {
                            echo 'Your file is too big!';
                        }
                    } else {
                        echo 'There was an error uploading your file!';
                    }
                } else {
                    echo 'Wrong file type!';
                }
            }
        }

    } else {
        header('Location: ../products.php');
        exit();
    }
