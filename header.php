<!-- Start Header Area -->
<header class="header_area sticky-header">
    <div class="main_menu">
        <nav class="navbar navbar-expand-lg navbar-light main_box">
            <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <h3>Smart Drops<br>Supermarket <br>& Boutique</h3><a class="navbar-brand logo_h" href="index.php"><img style="width:75px;height:75px;" src="img/sds1.jpeg" alt=""></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                 aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
                  <ul class="nav navbar-nav menu_nav ml-auto">
                    <li class="nav-item" id="home"><a class="nav-link" href="home.php">Home</a></li>
                    <li class="nav-item" id="contact"><a class="nav-link" href="contact.php">Contact Us</a></li>
                    <style>
                      @media (min-width: 991px) {
                        #cart {
                          display: none; 
                        } 
                      }
                    </style>
                    <?php
                      if(isset($_SESSION['email'])){
                        echo '
                        <li class="nav-item submenu dropdown">
                          <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Categories</a>
                          <ul class="dropdown-menu">
                            <li class="nav-item" id="baby"><a class="nav-link" href="baby.php">Baby Products</a></li>
                            <li class="nav-item" id="boutique"><a class="nav-link" href="boutique.php">Boutique</a></li>
                            <li class="nav-item" id="confec"><a class="nav-link" href="confec.php">Confectioneries</a></li>
                            <li class="nav-item" id="cosmetics"><a class="nav-link" href="cosmetics.php">Cosmetic Products</a></li>
                            <li class="nav-item" id="drinks"><a class="nav-link" href="drinks.php">Drinks</a></li>
                            <li class="nav-item" id="gifts"><a class="nav-link" href="gifts.php">Household and Gift Items</a></li>
                            <li class="nav-item" id="grocery"><a class="nav-link" href="grocery.php">Grocery</a></li>
                          </ul>
                        </li>
                        <li class="nav-item" id="profile"><a class="nav-link" href="profile.php">Profile</a></li>
                        <li class="nav-item" id="cart"><a class="nav-link" href="cart.php">Cart</a></li>
                        <li class="nav-item"><a class="nav-link" href="#" data-toggle="modal" data-target="#logoutModal">Logout</a></li>
                        ';
                      } else {
                        echo '
                        <li class="nav-item" id="home"><a class="nav-link" href="login.php">Login</a></li>
                        <li class="nav-item" id="home"><a class="nav-link" href="registere.php">Register</a></li>
                        ';
                      }
                    ?>
                  </ul>
                  <?php
                    if(isset($_SESSION['email'])){
                      echo '
                        <ul class="nav navbar-nav navbar-right">
                          <li class="nav-item" id="home"><a class="cart" href="cart.php"><span class="ti-bag"></span><span id="cart_item"></span></a></li>
                          <li class="nav-item" id="home">
                          <button class="search"><span class="lnr lnr-magnifier" id="search"></span></button>
                          </li>
                        </ul>';
                        }
                    ?>
                </div>
            </div>
        </nav>
    </div>
    <div class="search_input" id="search_input_box">
      <div class="container">
        <form class="d-flex justify-content-between">
          <input type="text" class="form-control" id="search_input" placeholder="Search Here">
          <button type="submit" class="btn"></button>
          <span class="lnr lnr-cross" id="close_search" title="Close Search"></span>
        </form>
      </div>
    </div>
    <div id="message"></div>
    <div class="alert alert-danger alert-dismissible fade show" style="display:<?php if (isset($_SESSION['showAlert'])){echo $_SESSION['showAlert'];}else{echo 'none';} unset($_SESSION['showAlert']); ?>;" role="alert">
      <span style="text-align:center;"><?php if (isset($_SESSION['message'])){echo $_SESSION['message'];} unset($_SESSION['message']); ?></span>
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
      </button>
    </div>
</header>
<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
        <button class="close" type="button" style="cursor:pointer;" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">Select "Logout" below if you are ready to logout.</div>
      <div class="modal-footer">
          <button class="btn btn-secondary" style="cursor:pointer;" type="button" data-dismiss="modal">Cancel</button>
          <form class="" action="logout.inc.php" method="POST">
              <button name="submit" class="btn btn-danger"  style="cursor:pointer;" type="submit">Logout</button>
          </form>
      </div>
    </div>
  </div>
</div>
<!-- End Header Area -->
