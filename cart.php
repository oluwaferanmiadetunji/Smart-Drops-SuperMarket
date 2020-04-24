<?php
	include("config.php");
	session_start();
	if(!isset($_SESSION['email'])){
	   header("Location: login.php");
  }
  $user = $_SESSION['name'];
?>
<!DOCTYPE html>
<html lang="zxx" class="no-js">

<head>
    <!-- Mobile Specific Meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon-->
    <link rel="shortcut icon" href="img/fav.png">
    <!-- Author Meta -->
    <meta name="author" content="CodePixar">
    <!-- Meta Description -->
    <meta name="description" content="">
    <!-- Meta Keyword -->
    <meta name="keywords" content="">
    <!-- meta character set -->
    <meta charset="UTF-8">
    <!-- Site Title -->
    <title>Smart Drops Supermarket</title>

    <!--
            CSS
            ============================================= -->
    <link href="fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="css/linearicons.css">
    <link rel="stylesheet" href="css/owl.carousel.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/themify-icons.css">
    <link rel="stylesheet" href="css/nice-select.css">
    <link rel="stylesheet" href="css/nouislider.min.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/custom.css">
</head>

<body>

   <!-- Start Header Area -->
	<?php include('header.php');?>
	<!-- End Header Area -->

    <!-- Start Banner Area -->
    <section class="banner-area organic-breadcrumb">
        <div class="container">
            <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
                <div class="col-first">
                    <h1>Shopping Cart</h1>
                    <nav class="d-flex align-items-center">
                        <a href="home.php">Home<span class="lnr lnr-arrow-right"></span></a>
                        <a href="category.php">Cart</a>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <!-- End Banner Area -->

    <!--================Cart Area =================-->
    <section class="cart_area">
        <div class="container">
            <div class="cart_inner">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Product</th>
                                <th scope="col">Unit Price</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">Sub Total</th>
                                <th scope="col">
                                    <a href="action.php?clear=all" onclick="return confirm('Are you sure you want to clear your bag?');" style="font-size:15px;" class="badge-danger badge"><i class="fas fa-trash-alt"></i>&nbsp;&nbsp;Clear bag</a>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php 
                            $sql = "SELECT * FROM cart WHERE user='$user';";
                            $result = mysqli_query($conn, $sql);
                            $total = 0;
                            while ($row = mysqli_fetch_array($result)) {?>
                            <?php $total += $row['total_price'];?>
                            <tr>
                                <td>
                                    <input type="hidden" class="pid" value="<?php echo $row['id']; ?>">
                                    <input type="hidden" class="pprice" value="<?php echo $row['product_price']; ?>">
                                    <div class="media">
                                        <div class="d-flex">
                                            <img style="width:150px;height:150px;" src="img/product/<?php echo $row['product_image']; ?>" alt="">
                                        </div>
                                        <div class="media-body">
                                            <p><?php echo $row['product_name']; ?></p>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <h5><span>&#8358;</span> <?php echo number_format($row['product_price'], 2); ?></h5>
                                </td>
                                <td>
                                    <div class="product_count">
                                        <input type="number" class="itemQty" style="width:80px;" value="<?php echo $row['quantity']; ?>" class="input-text qty">
                                    </div>
                                </td>
                                <td>
                                    <h5><span>&#8358;</span> <?php echo number_format($row['total_price'], 2); ?></h5>
                                </td>
                                <td>
                                <a href="action.php?remove=<?php echo $row['product_id'];?>" onclick="return confirm('Are you sure you want to remove this item?');" class="text-danger lead"  style="font-size:20px;"> <i class="fas fa-trash"></i></a>
                                </td>
                            </tr>
                            <?php } ?>
                            
                            <tr>
                                <td>

                                </td>
                                <td>

                                </td>
                                <td>
                                    <h5>Total</h5>
                                </td>
                                <td>
                                    <h5><b><span>&#8358;</span> <?php echo number_format($total, 2); ?></b></h5>
                                </td>
                            </tr>
                            <tr class="out_button_area">
                                <td>

                                </td>
                                <td>

                                </td>
                                <td>

                                </td>
                                <td>
                                    <div class="checkout_btn_inner d-flex align-items-center row">
                                        <a class="gray_btn" href="home.php"><i class="fas fa-cart-plus"></i> &nbsp;&nbsp;Continue Shopping</a>
                                        <a class="primary-btn" <?php if($total > 1){echo "href='checkout.php'";} else{ echo "";}?>><i class="fas fa-credit-card"></i>&nbsp;&nbsp;Proceed to checkout</a>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                        
                    </table>
                </div>
            </div>
        </div>
    </section>
    <!--================End Cart Area =================-->

    <!-- start footer Area -->
    <?php include('footer.php');?>
    <!-- End footer Area -->

    <script src="js/vendor/jquery-2.2.4.min.js"></script>
	<script src="js/vendor/bootstrap.min.js"></script>
	<script src="js/jquery.ajaxchimp.min.js"></script>
	<script src="js/jquery.nice-select.min.js"></script>
	<script src="js/jquery.sticky.js"></script>
    <script src="js/nouislider.min.js"></script>
	<script src="js/jquery.magnific-popup.min.js"></script>
	<script src="js/owl.carousel.min.js"></script>
	<script src="js/gmaps.min.js"></script>
	<script src="js/main.js"></script>
    <script>
        $(document).ready(function(){
          var user = '<?php echo $_SESSION['name'] ?>';
          load_cart_item_number();
            function load_cart_item_number() {
                $.ajax({
                    url: 'action1.php',
                    method: 'get',
                    data: {cartItem:"cart_item", user:user},
                    success: function(response){
                        $("#cart_item").html(response);
                    }
                })
            }
            $(".itemQty").on('change', function(){
                var $el = $(this).closest('tr');
                var pid = $el.find(".pid").val();
                var pprice = $el.find(".pprice").val();
                var qty = $el.find(".itemQty").val();
                location.reload(true);
                $.ajax({
                    url: 'action2.php',
                    method: 'post',
                    cache: false,
                    data: {qty:qty, pid:pid, pprice:pprice, user:user},
                    success: function(response) {
                        console.log(response);
                    }
                })
            });
        });
    </script>
</body>

</html>