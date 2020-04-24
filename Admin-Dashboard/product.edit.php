<?php
	include("utilities/config.php");
	session_start();
	if(!isset($_SESSION['username'])){
	   header("Location: index.php");
	}
	if (isset($_GET['edit'])) {
		$id = $_GET['edit'];
		$update = true;
		$sql = "SELECT * FROM products WHERE product_id='$id';";
		$result = mysqli_query($conn, $sql);
		$resultcheck = mysqli_num_rows($result);
		if ($resultcheck > 0) {
			$row = mysqli_fetch_assoc($result);
      $product_name = $row['product_name'];
      $category = $row['category'];
      $price = $row['product_price'];
		}
	}
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">


    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Update Product</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

	<!-- For Date Picker-->
	<script src="vendor/jquery/jquery.min.js"></script>
	<link rel="stylesheet" href="css/bootstrap-iso.css">
	<script src="js/date-picker.min.js" type="text/javascript"></script>
	<link rel="stylesheet" href="css/date-picker.css">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.css" rel="stylesheet">
    <link href="css/custom.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

    <!-- Page Wrapper -->
    <div id="wrapper">

      <?php
  		include("utilities/sidebar.php");
  	?>

      <!-- Content Wrapper -->
      <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">
<!-- Topbar -->
<?php include('utilities/topbar.php')?>
        <!-- End of Topbar -->
    <div style="margin-top:30px;" class="container-fluid">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
                <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
                <div class="col-lg-10">
                    <div class="p-5">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">Edit Product!</h1>
                        </div>

						<div class="bootstrap-iso">
	                        <form class="user" action="utilities/edit_product.php" method="POST">
								<input type="hidden" name="id" value="<?php echo $id; ?>">
	                            <div class="form-group row">
	                                <label for="name" class="col-sm-2 col-form-label form_label">Product Name</label>
	                                <div class="col-sm-8">
	                                    <input type="text" class="form-control form-control-user" autofocus value="<?php echo $product_name; ?>" name="product_name" id="product_name">
	                                </div>
	                            </div>
                                <div class="form-group row">
	                                <label for="name" class="col-sm-2 col-form-label form_label">Category Name</label>
	                                <div class="col-sm-8">
	                                    <input type="text" class="form-control form-control-user" autofocus value="<?php echo $category; ?>" name="category" id="category">
	                                </div>
	                            </div>
                                <div class="form-group row">
	                                <label for="name" class="col-sm-2 col-form-label form_label">Price</label>
	                                <div class="col-sm-8">
	                                    <input type="text" class="form-control form-control-user" autofocus value="<?php echo $price; ?>" name="price" id="price">
	                                </div>
	                            </div>
                                <!--<div class="form-group row">
	                                <label for="name" class="col-sm-2 col-form-label form_label">Image</label>
	                                <div class="col-sm-8">
	                                    <input type="text" class="form-control form-control-user" autofocus value="<?php echo $image; ?>" name="image" id="image">
	                                </div>
	                            </div>-->
	                            <button name="submit" id="submit" class="btn btn-primary btn-user btn-block">
	                                Update
	                            </button>

	                        </form>
						</div>
                    </div>
                </div>
            </div>
            </div>
        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>



</body>

</html>
