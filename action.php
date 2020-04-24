<?php
    session_start();
    include("config.php");
    if(isset($_POST['pid'])) {
        $pid = $_POST['pid'];
        $user = $_POST['user'];
        $pname = $_POST['pname'];
        $pprice = $_POST['pprice'];
        $pimage = $_POST['pimage'];
        $pcode = $_POST['pcode'];
        $pqty = 1;
        $sql = "SELECT product_id from cart WHERE (product_id = '$pcode' AND user = '$user');";
        $result = mysqli_query($conn, $sql);
        $resultcheck = mysqli_num_rows($result);
        if ($resultcheck > 0) {
            echo '
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <span style="text-align:center;">Item already in your bag</span>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            ';
        } else if ($resultcheck < 1) {
            $sql = "INSERT INTO cart (id, product_name, product_price, product_image, quantity, total_price, product_id, user) VALUES (NULL, '$pname', '$pprice', '$pimage', '$pqty', '$pprice', '$pcode', '$user');";
            mysqli_query($conn, $sql);
            echo '
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <span style="text-align:center;">Item added to your bag</span>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            ';
        }
    }

    if(isset($_GET['remove'])) {
        $id = $_GET['remove'];
        $sql = "DELETE FROM cart WHERE product_id = '$id';";
        mysqli_query($conn, $sql);
        $_SESSION['showAlert'] = 'block';
        $_SESSION['message'] = 'Item removed from bag!';
        header('Location: cart.php');
    }

    if(isset($_GET['clear'])) {
        $id = $_GET['clear'];
        $sql = "DELETE FROM cart;";
        mysqli_query($conn, $sql);
        $_SESSION['showAlert'] = 'block';
        $_SESSION['message'] = 'Bag cleared!';
        header('Location: cart.php');
    }

    