<?php
    include("config.php");
    $output = '';
    $sql = "SELECT * FROM products WHERE category='grocery' AND product_name LIKE '%" . $_POST["search"] . "%';";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_array($result)) {
            $output .= '<div class="col-lg-3 col-md-6">';
            $output .= '<div class="single-product">';
            $output .= '<img class="img-fluid" src="img/product/' . $row['product_image'] .'">';
            $output .= '<div class="product-details">';
            $output .= '<h6>' . $row['product_name'] . '</h6>';
            $output .= '<div class="price">';
            $output .= '<h6>#' . $row['product_price'] . '</h6>';
            $output .= '</div>';
            $output .= '<div class="prd-bottom">';
            $output .= '<a onclick="cart.add(' . $row['product_id'] . ');" class="social-info pdt-add" style="cursor:pointer;">';
            $output .= '<span class="ti-bag"></span>';
            $output .= '<p class="hover-text">add to bag</p>';
            $output .= '</a>';
            $output .= '<a href="" class="social-info" style="display:none;">';
            $output .= '<span class="lnr lnr-heart"></span>';
            $output .= '<p class="hover-text">Wishlist</p>';
            $output .= '</a>';
            $output .= '<a href="single_product.php?product=' . $row['product_id'] . '" class="social-info">';
            $output .= '<span class="lnr lnr-move"></span>';
            $output .= '<p class="hover-text">view more</p>';
            $output .= '</a>';
            $output .= '</div>';
            $output .= '</div>';
            $output .= '</div>';
            $output .= '</div>';
        }
        echo $output;
    } else {
        echo 'Product Not found';
    }

                     
                                                   
                                                   
                                                
                                                
                                                    
                                                    
                                                
                                            
                                        
                                    
                                