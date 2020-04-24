<?php
	include("config.php");
	session_start();
	if(!isset($_SESSION['email'])){
	   header("Location: login.php");
    }
    $order_id = uniqid();
    $total = 0;
    $all_items = '';
    $items = array();
    $sql = "SELECT CONCAT(product_name, '(',quantity,')') AS ItemQty, total_price FROM cart;";
    $result = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_array($result)) {
        $total += $row['total_price'];
        $items[] = $row['ItemQty'];
    }
    $all_items = implode(", ", $items);
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

    <!-- Start Header Area -->
	<?php include('header.php');?>
  
	<!-- End Header Area -->
    <div id="confirmation" style="display:none">
      <?php include('confirmation.php');?>
    </div>

    <div id="transfer" style="display:none">
      <?php include('transfer.php');?>
    </div>

    <div id="paypal" style="display:block">
      <?php include('paypal.php');?>
    </div>

    <div id="checkout" style="display:;">
      <!-- Start Banner Area -->
      <section class="banner-area organic-breadcrumb">
          <div class="container">
              <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
                  <div class="col-first">
                      <h1>Checkout</h1>
                      <nav class="d-flex align-items-center">
                          <a href="home.php">Home<span class="lnr lnr-arrow-right"></span></a>
                          <a href="single-product.php">Checkout</a>
                      </nav>
                  </div>
              </div>
          </div>
      </section>
      <!-- End Banner Area -->

      <!--================Checkout Area =================-->
      <section class="checkout_area section_gap">
          <div class="container">
            <div class="text-center;" style="margin: 5px auto;width:200px;">
              <h3>Billing Details</h3>
            </div>
            <div class="billing_details">
                <div class="row">
                    <div class="col-lg-5 col-11" style="margin: 0 auto;">
                        <div class="order_box">
                            <h2>Your Order</h2>
                            <ul class="list">
                                <li><a>Product &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Qty <span>Total</span></a></li>
                                <?php
                                    $sql1 = "SELECT * FROM cart;";
                                    $result1 = mysqli_query($conn, $sql1);
                                    while ($row1 = mysqli_fetch_array($result1)) {?>
                                        <li><a><?php echo $row1['product_name'] . '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;x' . $row1['quantity'] . ' <span class="last"> &#8358;' . number_format($row1['total_price'], 2) . '</span>'; ?></a></li>
                                    <?php } ?>
                            </ul>
                            <ul class="list list_2">
                                <li><a>Subtotal <span><?php echo "&#8358; " . number_format($total, 2); ?></span></a></li>
                                <li><a>Shipping <span>&#8358;500.00</span></a></li>
                                <li><a>Total <span><?php echo "&#8358; <span id='pay_total1'>" . number_format($total + 500, 2); ?></span></span></a></li>
                                <li style="display:none;"><a>Total <span><?php echo "<span id='pay_total'>" . (($total + 500) * 100); ?></span></span></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-7 col-11" id="order" style="margin: 0 auto;">
                        <form class="row contact_form" style="margin-left:10px;margin-right:10px;" id="placeOrder" method="post">
                            <input type="hidden" name="products" id="products" value="<?php echo $all_items;?>">
                            <input type="hidden" name="date" id="date" value="<?php echo date("Y-m-d h:i:s") ?>">
                            <input type="hidden" name="total" id="total" value="">
                            <input type="hidden" name="order_id" id="order_id" value="<?php echo $order_id ?>">

                            <div class="row" style="background-color:#e5ecee;;margin-top:5px;padding-top:5px;width:720px;">
                              <div class="col-md-12 form-group p_star">
                                  <label for="">Name</label>
                                  <input type="text" class="form-control" value="<?php echo $_SESSION['name']; ?>" id="name" required name="name">
                              </div>
                              <div class="col-md-6 form-group p_star">
                                  <label for="">Phone Number</label>
                                  <input type="tel" class="form-control" value="<?php echo $_SESSION['phone']; ?>" required id="phone" name="phone">
                              </div>
                              <div class="col-md-6 form-group p_star">
                                  <label for="">Email Address</label>
                                  <input type="text" class="form-control" value="<?php echo $_SESSION['email']; ?>"  required id="email" name="email">
                              </div>
                            </div>

                            <div class="row" style="background-color:#e5ecee;margin-top:10px;padding-top:10px;width:720px;">
                              <div class="col-md-12 form-group p_star">
                                  <label for="">Shipping address (optional)</label>
                                  <input type="text" class="form-control" placeholder="Enter delivery address" id="address" name="address">
                              </div>
                              <div class="col-md-12 form-group p_star">
                                  <label for="">Pick Up location (optional)</label>
                                  <select class="country_select" name="pickup" id="pickup">
                                    <option value="" selected>Select pickup location</option>
                                    <option value="bodija">37 Ladoke Akintola street,  New  Bodija. Ibadan</option>
                                  </select>
                              </div>
                            </div>
                            <div class="row" style="background-color:#e5ecee;margin-top:10px;padding-top:10px;width:720px;">
                              <div class="col-md-12 form-group p_star">
                                  <label for="">Select Payment Mode</label>
                                  <select class="country_select" name="pmode" id="pmode" required>
                                      <option value="" selected disabled>Select payment mode</option>
                                      <option value="pay_on_delivery">Cash On Delivery</option>
                                      <option value="transfer">Bank Transfer</option>
                                      <option value="paypal">Paypal</option>
                                  </select>
                              </div>
                            </div>
                            <button type="submit" style="margin-bottom:10px;" class="primary-btn">Complete Order</button>
                        </form>
                    </div>
                  </div>
            </div>
          </div>
      </section>
      <!--================End Checkout Area =================-->
    </div>

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
          var total_due = $("#pay_total1").html();
          var total_in_kobo = $("#pay_total").html();
          $("#total").val(total_due);
          $("#placeOrder").submit(function(e) {
              e.preventDefault();
              
              var name = $("#name").val();
              var email = $("#email").val();
              var date = $("#date").val();
              var total = $("#total").val();
              var order_id = $("#order_id").val();
              var pmode = $("#pmode").val();
              localStorage.setItem("Name", name);
              localStorage.setItem("Email", email);
              localStorage.setItem("Date", date);
              localStorage.setItem("Total", total_in_kobo);
              localStorage.setItem("Order_id", order_id);
              localStorage.setItem("Pmode", pmode);

              document.getElementById('date_con').innerHTML = date;
              document.getElementById('total_con').innerHTML = total;
              document.getElementById('order_id_con').innerHTML = order_id; 

              document.getElementById('date_tra').innerHTML = date;
              document.getElementById('total_tra').innerHTML = total;
              document.getElementById('order_id_tra').innerHTML = order_id;


              // $.ajax({
              //     url: 'action3.php',
              //     method: 'post',
              //     data: $('form').serialize() + "&action=order",
              //     success: function(response) {
              //       if (response == 'pay_on_delivery') {
              //         document.getElementById("checkout").style.display = 'none';
              //         document.getElementById("confirmation").style.display = 'block';
              //       } else if (response == 'transfer') {
              //         document.getElementById("checkout").style.display = 'none';
              //         document.getElementById("transfer").style.display = 'block';
              //       } else if (response == 'paypal') {
              //         document.getElementById("checkout").style.display = 'none';
              //         document.getElementById("paypal").style.display = 'block';
              //       }
              //     }
              // });
          });
      });
    </script>
</body>

</html>
