<?php
	include("utilities/config.php");
	session_start();
	if(!isset($_SESSION['username'])){
	   header("Location: index.php");
	}
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Orders</title>

  <!-- Custom fonts for this template -->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Custom styles for this template -->
  <link href="css/sb-admin-2.css" rel="stylesheet">

  <!-- Custom styles for this page -->
  <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<body id="page-top">

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
        <!-- Begin Page Content -->
        <div style="margin-top:30px;" class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Orders</h1>
          <!-- DataTales Example -->
          <div style="margin-top:30px;" class="card shadow mb-4">
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                        <th>Order Date</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Products</th>
                        <th>Location</th>
                        <th>Payment Mode</th>
                        <th>Amount</th>
                        <th>Status</th>
                        <th></th>
                    </tr>
                  </thead>
                  <tbody>
					  <?php
	  				  	$sql = "SELECT * FROM orders;";
	  					$result = mysqli_query($conn, $sql);
	  					$resultcheck = mysqli_num_rows($result);
	  					if ($resultcheck > 0) {
	  						while ($row = mysqli_fetch_assoc($result)) {
								?>
		                    <tr>
                            <td><?php echo $row['date']; ?></td>
		                    <td><?php echo $row['name']; ?></td>
                            <td><?php echo $row['email']; ?></td>
                            <td><?php echo $row['products']; ?></td>
                            <td><?php echo $row['address'] . $row['pickup']; ?></td>
                            <td><?php echo $row['pmode']; ?></td>
                            <td><?php echo $row['amount']; ?></td>
                            <td><?php echo $row['status']; ?></td>
                            <td><a href="process.php?process=<?php echo $row['order_id']; ?>" class="btn btn-primary">Process</a></td>
		                    </tr>
							<?php
							}
						} ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <?php
  		include("utilities/footer.php");
  	?>

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <?php
	include("utilities/logout.modal.php");
?>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="js/demo/datatables-demo.js"></script>

</body>

</html>
