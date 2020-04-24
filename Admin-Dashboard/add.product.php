<?php
	include("utilities/config.php");
	session_start();
	if(!isset($_SESSION['username'])){
	   header("Location: index.php");
	}

?>
<!DOCTYPE html>
<html lang="en">

<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">


    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Add Product</title>

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
                            <h1 class="h4 text-gray-900 mb-4">Add Product!</h1>
                        </div>

						<div class="bootstrap-iso">
	                        <form class="user" action="utilities/product.add.php" method="POST" enctype="multipart/form-data">
	                            <div class="form-group row">
	                                <label for="product_name" class="col-sm-2 col-form-label form_label">Product</label>
	                                <div class="col-sm-8">
	                                    <input type="text" class="form-control form-control-user" autofocus value="" name="product_name" id="product_name">
	                                </div>
	                            </div>
	                            </div>
                                <div class="form-group row">
	                                <label for="category_name" class="col-sm-2 col-form-label form_label">Category</label>
	                                <div class="col-sm-8">
										<select class="form-control form-control-user" name="category" id="category">
										    <option selected>Choose...</option>
										    <option value="baby">Baby Products</option>
										    <option value="boutique">Boutique Products</option>
										    <option value="confec">Confectioneries</option>
										    <option value="cosmetics">Cosmetics Products</option>
										    <option value="drinks">Drinks</option>
										    <option value="gifts">Household and Gift Items</option>
										    <option value="grocery">Grocery</option>
										  </select>
	                                </div>
	                            </div>
                                <div class="form-group row">
	                                <label for="price" class="col-sm-2 col-form-label form_label">Price</label>
	                                <div class="col-sm-8">
	                                    <input type="text" class="form-control form-control-user"  value="" placeholder="Enter price in figure only e.g 1000.00, 1500.50" name="price" id="price">
	                                </div>
                                </div>
                                <div class="form-group row">
                                    <label for="image" class="col-sm-2 col-form-label form_label">Image</label>
                                    <div class="col-sm-8">
                                        <input type="file" class="form-control form-control-user" name="file" id="file">
	                                </div>
                                </div>
	                            <button name="submit" id="submit" class="btn btn-primary btn-user btn-block">
	                                Add
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
