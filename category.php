<?php 
    $sql1 = "SELECT * FROM products;";
    $result1 = mysqli_query($conn, $sql1);
    $all_products = mysqli_num_rows($result1);

    $sql2 = "SELECT * FROM products WHERE category='baby';";
    $result2 = mysqli_query($conn, $sql2);
    $baby_products = mysqli_num_rows($result2);

    $sql3 = "SELECT * FROM products WHERE category='boutique';";
    $result3 = mysqli_query($conn, $sql3);
    $boutique_products = mysqli_num_rows($result3);

    $sql4 = "SELECT * FROM products WHERE category='confec';";
    $result4 = mysqli_query($conn, $sql4);
    $confec_products = mysqli_num_rows($result4);

    $sql5 = "SELECT * FROM products WHERE category='cosmetics';";
    $result5 = mysqli_query($conn, $sql5);
    $cosmetics_products = mysqli_num_rows($result5);

    $sql6 = "SELECT * FROM products WHERE category='drinks';";
    $result6 = mysqli_query($conn, $sql6);
    $drinks_products = mysqli_num_rows($result6);

    $sql7 = "SELECT * FROM products WHERE category='gifts';";
    $result7 = mysqli_query($conn, $sql7);
    $gifts_products = mysqli_num_rows($result7);

    $sql8 = "SELECT * FROM products WHERE category='grocery';";
    $result8 = mysqli_query($conn, $sql8);
    $grocery_products = mysqli_num_rows($result8);
?>

<div class="row">
    <div class="col-xl-3 col-lg-4 col-md-5">
        <div class="sidebar-categories">
            <div class="head">Browse Categories</div>
            <ul class="main-categories">
                <li class="main-nav-list child"><a href="home.php">All Products<span class="number">(<?php echo $all_products; ?>)</span></a></li>
                <li class="main-nav-list child"><a href="baby.php">Baby products<span class="number">(<?php echo $baby_products; ?>)</span></a></li>
                <li class="main-nav-list child"><a href="boutique.php">Boutique<span class="number">(<?php echo $boutique_products; ?>)</span></a></li>
                <li class="main-nav-list child"><a href="confec.php">Confectioneries<span class="number">(<?php echo $confec_products; ?>)</span></a></li>
                <li class="main-nav-list child"><a href="cosmetics.php">Cosmetic Products<span class="number">(<?php echo $cosmetics_products; ?>)</span></a></li>
                <li class="main-nav-list child"><a href="drinks.php">Drinks<span class="number">(<?php echo $drinks_products; ?>)</span></a></li>
                <li class="main-nav-list child"><a href="gifts.php">Household and Gift Items<span class="number">(<?php echo $gifts_products; ?>)</span></a></li>
                <li class="main-nav-list child"><a href="grocery.php">Grocery<span class="number">(<?php echo $grocery_products; ?>)</span></a></li>
			</ul>
		</div>
        <div class="sidebar-filter mt-50" style="display:none;">
            <div class="top-filter-head">Product Filters</div>
            <div class="common-filter">
                <div class="head">Brands</div>
                <form action="#">
                    <ul>
                        <li class="filter-list"><input class="pixel-radio" type="radio" id="apple" name="brand"><label for="apple">Apple<span>(29)</span></label></li>
                        <li class="filter-list"><input class="pixel-radio" type="radio" id="asus" name="brand"><label for="asus">Asus<span>(29)</span></label></li>
                        <li class="filter-list"><input class="pixel-radio" type="radio" id="gionee" name="brand"><label for="gionee">Gionee<span>(19)</span></label></li>
                        <li class="filter-list"><input class="pixel-radio" type="radio" id="micromax" name="brand"><label for="micromax">Micromax<span>(19)</span></label></li>
                        <li class="filter-list"><input class="pixel-radio" type="radio" id="samsung" name="brand"><label for="samsung">Samsung<span>(19)</span></label></li>
                    </ul>
                </form>
            </div>
            <div class="common-filter">
                <div class="head">Color</div>
                <form action="#">
                    <ul>
                        <li class="filter-list"><input class="pixel-radio" type="radio" id="black" name="color"><label for="black">Black<span>(29)</span></label></li>
                        <li class="filter-list"><input class="pixel-radio" type="radio" id="balckleather" name="color"><label for="balckleather">Black
                                Leather<span>(29)</span></label></li>
                        <li class="filter-list"><input class="pixel-radio" type="radio" id="blackred" name="color"><label for="blackred">Black
                                with red<span>(19)</span></label></li>
                        <li class="filter-list"><input class="pixel-radio" type="radio" id="gold" name="color"><label for="gold">Gold<span>(19)</span></label></li>
                        <li class="filter-list"><input class="pixel-radio" type="radio" id="spacegrey" name="color"><label for="spacegrey">Spacegrey<span>(19)</span></label></li>
                    </ul>
                </form>
            </div>
            <div class="common-filter">
                <div class="head">Price</div>
                <div class="price-range-area">
                    <div id="price-range"></div>
                    <div class="value-wrapper d-flex">
                        <div class="price">Price:</div>
                        <span>$</span>
                        <div id="lower-value"></div>
                        <div class="to">to</div>
                        <span>$</span>
                        <div id="upper-value"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>