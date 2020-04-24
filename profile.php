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
	<link rel="stylesheet" href="css/themify-icons.css">
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/nice-select.css">
	<link rel="stylesheet" href="css/nouislider.min.css">
	<link rel="stylesheet" href="css/bootstrap.css">
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
                        <h1>Profile</h1>
                        <nav class="d-flex align-items-center">
                            <a href="home.php">Home<span class="lnr lnr-arrow-right"></span></a>
                            <a href="category.php">Profile</a>
                        </nav>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Banner Area -->


        <!--================Profile Box Area =================-->
        <section class="login_box_area section_gap">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="login_form_inner">
                            <div id="profile">
                                <h3>Profile</h3>
                                <form class="row login_form" action="login.inc.php" method="post">
                                    <div class="col-md-12 form-group">
                                        <input type="name" class="form-control" id="name" name="name" placeholder="Name" value="<?php echo $_SESSION['name']; ?>" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Name'" required readonly>
                                    </div>
                                    <div class="col-md-12 form-group">
                                        <input type="email" class="form-control" id="email" name="email" placeholder="Email" value="<?php echo $_SESSION['email']; ?>" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Email'" required readonly>
                                    </div>
                                    <div class="col-md-12 form-group">
                                        <input type="phone" class="form-control" id="phone" name="phone" placeholder="Phone Number" value="<?php echo $_SESSION['phone']; ?>" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Phone Number'" required readonly>
                                    </div>
                                    <div class="col-md-12 form-group">
                                        <input type="text" class="form-control" id="address" name="address" placeholder="Address" value="<?php echo $_SESSION['address']; ?>" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Address'" required readonly>
                                    </div>
                                    <div class="col-md-12 form-group">
                                        <a href="profile_update.php" style="color:blue;" id="displayForm">Click here to update your profile</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>


	<!--================End Profile Box Area =================-->
<?php include('footer.php');?>
	<script src="js/vendor/jquery-2.2.4.min.js"></script>
	<script src="js/vendor/bootstrap.min.js"></script>
	<script src="js/jquery.ajaxchimp.min.js"></script>
	<script src="js/jquery.nice-select.min.js"></script>
	<script src="js/jquery.sticky.js"></script>
	<script src="js/nouislider.min.js"></script>
	<script src="js/jquery.magnific-popup.min.js"></script>
	<script src="js/owl.carousel.min.js"></script>
	<script src="js/main.js"></script>
    <script type="text/javascript">
</body>

</html>
