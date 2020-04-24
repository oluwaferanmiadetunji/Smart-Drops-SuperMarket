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
	<link rel="stylesheet" href="css/linearicons.css">
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/themify-icons.css">
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/owl.carousel.css">
	<link rel="stylesheet" href="css/nice-select.css">
	<link rel="stylesheet" href="css/nouislider.min.css">
	<link rel="stylesheet" href="css/ion.rangeSlider.css" />
	<link rel="stylesheet" href="css/ion.rangeSlider.skinFlat.css" />
	<link rel="stylesheet" href="css/magnific-popup.css">
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
                    <h1>Home</h1>
                </div>
            </div>
        </div>
    </section>
    <!-- End Banner Area -->

	<!-- start features Area -->
	<?php include('features.php');?>
	<!-- end features Area -->


	<!-- start product Area -->
	<section class="section_gap">
		<!-- single product slide -->
		<div class="single-product-slider">
			<div class="container">
				<div class="row justify-content-center">
					<div class="col-lg-6 text-center">
						<div class="section-title">
							<h1>Latest Products</h1>
							<p>Get our latest products</p>
						</div>
					</div>
				</div>
				<div class="row products">
                    <?php 
                    $sql = "SELECT * FROM products ORDER BY `id` DESC;";
                    $result = mysqli_query($conn, $sql);
                    while ($row = mysqli_fetch_array($result)) {?>
                        <!-- single product -->
                        <div class="col-lg-2 col-md-6 col-6 text-center" style="box-shadow: 2px 1px 1px white;">
                            <div class="single-product" style="margin-top:20px;width:165px;">
                                <img class="img-fluid product_image" style="width:150px;height:150px;" src="img/product/<?php echo $row['product_image']; ?>">
                                <div class="product-details">
                                    <h6><?php echo $row['product_name']; ?></h6>
                                    <div class="price">
                                        <h6><span>&#8358;</span> <?php echo number_format($row['product_price'], 2); ?></h6>
                                    </div>
                                    <div class="prd-bottom">
                                    <form action="" class="form-submit">
                                        <input type="hidden" class="user" value="<?php echo $_SESSION['name'];?>">
                                        <input type="hidden" class="pid" value="<?php echo $row['id'];?>">
                                        <input type="hidden" class="pname" value="<?php echo $row['product_name'];?>">
                                        <input type="hidden" class="pprice" value="<?php echo $row['product_price'];?>">
                                        <input type="hidden" class="pimage" value="<?php echo $row['product_image'];?>">
                                        <input type="hidden" class="pcode" value="<?php echo $row['product_id'];?>">
                                        <a style="cursor:pointer;" href="action.php?id=<?php echo $row['id']; ?>" class="social-info addItemBtn">
                                            <span class="ti-bag"></span>
                                            <p class="hover-text">add to bag</p>
                                        </a>
                                        <a href="single_product.php?product=<?= $row['product_id'] ?>" class="social-info">
                                            <span class="lnr lnr-move"></span>
                                            <p class="hover-text">view more</p>
                                        </a>
                                    </form>
                                        
                                        <!-- <a href="" class="social-info">
                                            <span class="lnr lnr-heart"></span>
                                            <p class="hover-text">Wishlist</p>
                                        </a>
                                        <a href="" class="social-info">
                                            <span class="lnr lnr-sync"></span>
                                            <p class="hover-text">compare</p>
                                        </a> -->
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
					
				</div>
			</div>
		</div>
		
				</div>
			</div>
		</div>
	</section>
	<!-- end product Area -->


	

	<!-- start footer Area -->
	<?php include('footer.php');?>
	<!-- End footer Area -->

	<script src="js/vendor/jquery-2.2.4.min.js"></script>
	<script src="js/vendor/bootstrap.min.js"></script>
	<script src="js/jquery.ajaxchimp.min.js"></script>
	<script src="js/jquery.nice-select.min.js"></script>
	<script src="js/jquery.sticky.js"></script>
	<script src="js/nouislider.min.js"></script>
	<script src="js/countdown.js"></script>
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

            load_cart_item_number();

           
        });
    </script>
</body>

</html>