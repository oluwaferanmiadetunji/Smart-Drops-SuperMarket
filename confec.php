<?php
	include("config.php");
	session_start();
	if(!isset($_SESSION['email'])){
	   header("Location: login.php");
    }
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
	<link rel="stylesheet" href="css/owl.carousel.css">
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/themify-icons.css">
	<link rel="stylesheet" href="css/nice-select.css">
	<link rel="stylesheet" href="css/nouislider.min.css">
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/main.css">
</head>

<body id="">
<?php include('header.php');?>
	<div  id="page-cart" class="ninja"></div>
	<div id="all_products">
    <!-- Start Banner Area -->
    <section class="banner-area organic-breadcrumb">
      <div class="container">
        <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
          <div class="col-first">
            <h1>Products</h1>
            <nav class="d-flex align-items-center">
              <a href="home.php">Home<span class="lnr lnr-arrow-right"></span></a>
              <a href="confec.php">Confectioneries</a>
            </nav>
          </div>
        </div>
      </div>
    </section>
    <!-- start features Area -->
    <?php include('features.php');?>
		<!-- end features Area -->
	<!-- End Banner Area -->
	<div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-6 text-center">
        <div class="section-title">
          <h1>Our Products</h1>
          <p>Get all our products now</p>
        </div>
      </div>
    </div>
    <?php include('category.php');?>
			<div class="col-xl-9 col-lg-8 col-md-7">
        
				<!-- Start Filter Bar -->
				<div class="filter-bar d-flex flex-wrap align-items-center">
					<div class="sorting col-lg-12" style="margin:auto;padding-top:10px;display:inline">
                        <div class="form-row align-items-center">
                            <input type="text" class="form-control mb-2" name="search_text" id="search_text" placeholder="Search for Product..." autocomplete required>
                        </div>
					</div>
				</div>
        <!-- End Filter Bar -->
        <!-- Start Best Seller -->
                <section class="lattest-product-area pb-40 category-list" style="padding: 10px;">
                    <div class="row" id="result"></div>
                </section>
				<section class="lattest-product-area pb-40 category-list" style="padding: 10px;" id="hide">
					<div class="row">
                        <?php
                            $results_per_page = 12;
                            $sql = "SELECT * FROM products WHERE category='confec';";
                            $result = mysqli_query($conn, $sql);
                            $number_of_results = mysqli_num_rows($result);
                            $number_of_pages = ceil($number_of_results/$results_per_page);

                            if(!isset($_GET['page'])){
                                $page = 1;
                            } else {
                                $page = $_GET['page'];
                            }
                            $this_page_first_result = ($page-1) * $results_per_page;

                            $sql = "SELECT * FROM products WHERE category='confec' LIMIT " . $this_page_first_result . "," . $results_per_page;
                            $result = mysqli_query($conn, $sql);
                            while ($row = mysqli_fetch_array($result)) {?>
                                <!-- single product -->
                                <div class="col-lg-3 col-md-6 col-6">
                                    <div class="single-product">
                                        <img class="img-fluid" style="width:150px;height:150px;" src="img/product/<?= $row['product_image'] ?>">
                                        <div class="product-details">
                                        <h6><?= $row['product_name'] ?></h6>
                                            <div class="price">
                                                <h6>#<?= $row['product_price'] ?></h6>
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
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php }?>
					</div>
                    <div class="filter-bar d-flex flex-wrap align-items-center text-center">
                        <div class="pagination text-center">
                            <?php 
                                for($page=1;$page<=$number_of_pages;$page++) {
                                    echo '<a href="confec.php?page='. $page . '">' .$page . '</a>';
                                }
                            ?>
                        </div>
				    </div>
				</section>
				<!-- End Best Seller -->
				
			</div>
		</div>
	</div>

	
	</div>
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
    <script>
        $(document).ready(function() {
            $('#search_text').keyup(function(){
                $('#hide').css('display', 'none');
                var txt = $(this).val();
                if (txt != '') {
                    $.ajax({
                        url: "fetch3.php",
                        method: "post",
                        data: {search:txt},
                        dataType: "text",
                        success: function(data) {
                            $('#result').html(data)
                        }
                    })
                } else {
                    $('#result').html('');
                }
            });
        });
    </script>
</body>

</html>
