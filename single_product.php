<?php
	include("config.php");
	session_start();
	if(!isset($_SESSION['email'])){
	   header("Location: login.php");
    }
    if (isset($_GET['product'])) {
		$id = $_GET['product'];
		$sql = "SELECT * FROM products WHERE product_id='$id';";
		$result = mysqli_query($conn, $sql);
		$resultcheck = mysqli_num_rows($result);
		if ($resultcheck > 0) {
			$row = mysqli_fetch_assoc($result);
            $product_name = $row['product_name'];
            $product_image = $row['product_image'];
            $product_price = $row['product_price'];
            $product_id = $row['product_id'];
            $category = $row['category'];
		}
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
	<link rel="stylesheet" href="css/linearicons.css">
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/themify-icons.css">
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/owl.carousel.css">
	<link rel="stylesheet" href="css/nice-select.css">
	<link rel="stylesheet" href="css/nouislider.min.css">
	<link rel="stylesheet" href="css/ion.rangeSlider.css" />
	<link rel="stylesheet" href="css/ion.rangeSlider.skinFlat.css" />
	<link rel="stylesheet" href="css/main.css">
</head>

<body>
<?php include('header.php');?>
	<div  id="page-cart" class="ninja"></div>
	<div id="all_products">
	<!-- Start Banner Area -->
        <section class="banner-area organic-breadcrumb">
            <div class="container">
                <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
                    <div class="col-first">
                        <h1>Product Details Page</h1>
                        <nav class="d-flex align-items-center">
                            <a href="home.php">Home<span class="lnr lnr-arrow-right"></span></a>
                            <a href="" >Shop<span class="lnr lnr-arrow-right"></span></a>
                            <a href="single-product.php">Product-details</a>
                        </nav>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Banner Area -->

        <!--================Single Product Area =================-->
	<div class="product_image_area" style="margin-bottom:20px;">
		<div class="container">
			<div class="row s_product_inner">
				<div class="col-lg-6">
					<div class="s_Product_carousel">
						<div class="single-prd-item">
							<img class="img-fluid" src="img/product/<?php echo $product_image; ?>">
						</div>
						<div class="single-prd-item">
							<img class="img-fluid" src="img/product/<?php echo $product_image; ?>">
						</div>
						<div class="single-prd-item">
							<img class="img-fluid" src="img/product/<?php echo $product_image; ?>">
						</div>
					</div>
				</div>
				<div class="col-lg-5 offset-lg-1">
					<div class="s_product_text">
						<h3><?php echo $product_name; ?></h3>
						<h2>&#8358; <?php echo $product_price; ?></h2>
						<ul class="list">
							<li><a class="active" href="#"><span>Category</span> : <?php echo strtoupper($category); ?></a></li>
							<li><a href="#"><span>Availibility</span> : In Stock</a></li>
						</ul>
						<div class="product_count">
                            <div class="card_area d-flex align-items-center">
                                <form action="" class="form-submit">
                                    <input type="hidden" class="user" value="<?php echo $_SESSION['name'];?>">
                                    <input type="hidden" class="pid" value="<?php echo $row['id'];?>">
                                    <input type="hidden" class="pname" value="<?php echo $row['product_name'];?>">
                                    <input type="hidden" class="pprice" value="<?php echo $row['product_price'];?>">
                                    <input type="hidden" class="pimage" value="<?php echo $row['product_image'];?>">
                                    <input type="hidden" class="pcode" value="<?php echo $row['product_id'];?>">
                                    <a class="primary-btn addItemBtn" style="margin-top:20px;" href="action.php?id=<?php echo $row['id']; ?>">Add to Cart</a>
							        <a class="icon_btn" href="#"><i class="lnr lnr lnr-diamond"></i></a>
                                </form>
						    </div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!--================End Single Product Area =================-->
	
	<!-- End related-product Area -->
<?php include('footer.php');?>
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
            $(".addItemBtn").click(function(e) {
                e.preventDefault();
                var $form = $(this).closest(".form-submit");
                var user = $form.find(".user").val();
                var pid = $form.find(".pid").val();
                var pname = $form.find(".pname").val();
                var pprice = $form.find(".pprice").val();
                var pimage = $form.find(".pimage").val();
                var pcode = $form.find(".pcode").val();

                $.ajax({
                    url: "action.php",
                    method: "post",
                    data: {pid:pid, user:user, pname:pname, pprice:pprice, pimage:pimage, pcode:pcode },
                    success: function(response) {
                        $("#message").html(response);
                        load_cart_item_number();
                    }
                })
            });
        });
    </script>

</body>

</html>
