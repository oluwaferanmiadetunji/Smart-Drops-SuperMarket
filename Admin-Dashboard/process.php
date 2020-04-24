<?php
	include("utilities/config.php");
	session_start();
	if(!isset($_SESSION['username'])){
	   header("Location: index.php");
	}
	if (isset($_GET['process'])) {
		$id = $_GET['process'];
		$update = true;
		$sql = "SELECT * FROM orders WHERE order_id='$id';";
		$result = mysqli_query($conn, $sql);
		$resultcheck = mysqli_num_rows($result);
		if ($resultcheck > 0) {
			$row = mysqli_fetch_assoc($result);
			$name = $row['name'];
      $email = $row['email'];
      $phone = $row['phone'];
      $address = $row['address'];
      $pickup = $row['pickup'];
      $products = $row['products'];
			$amount = $row['amount'];
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

  <title>UpdateUser</title>

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
                          <h1 class="h4 text-gray-900 mb-4">Edit Account!</h1>
                      </div>
						          <div class="bootstrap-iso">
	                      <form class="user" action="utilities/action.php" method="POST">
								          <input type="hidden" name="id" value="<?php echo $id; ?>">
	                        <div class="form-group row">
                            <label for="name" class="col-sm-2 col-form-label form_label">Name</label>
                            <div class="col-sm-8">
                              <input type="text" class="form-control form-control-user" autofocus value="<?php echo $name; ?>" name="name" id="name">
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="email" class="col-sm-2 col-form-label form_label">Email</label>
                            <div class="col-sm-8">
                              <input type="email" class="form-control form-control-user" value="<?php echo $email; ?>" name="email" id="email">
                            </div>
                          </div>
								          <div class="form-group row">
                            <label for="phone" class="col-sm-2 col-form-label form_label">Phone Number</label>
                            <div class="col-sm-8">
                              <input type="text" class="form-control form-control-user" value="<?php echo $phone; ?>" name="phone" id="phone">
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="address" class="col-sm-2 col-form-label form_label">Address</label>
                            <div class="col-sm-8">
                              <input type="text" class="form-control form-control-user" value="<?php echo $address . $pickup; ?>" name="address" id="address">
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="state" class="col-sm-2 col-form-label form_label">Products</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control form-control-user" value="<?php echo $products; ?>" name="products" id="products">
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="state" class="col-sm-2 col-form-label form_label">Amount</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control form-control-user" value="<?php echo $amount; ?>" name="amount" id="amount">
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="state" class="col-sm-2 col-form-label form_label">Delivery date</label>
                            <div class="col-sm-8">
                              <input type="date" class="form-control form-control-user" placeholder="Enter date for delivery in " required name="date" id="date">
                            </div>
                          </div>
                          <button name="submit" id="submit" class="btn btn-primary btn-user btn-block">
                            Process
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
