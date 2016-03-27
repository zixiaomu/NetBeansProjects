<?php

/*  


 * Student Info: Name=YUGENG CHANG, ID=9790

 * Subject: CS526(A)_HWNo_SPRING_2016

 * Author: yugengchang 

 * Filename: add to cart.php 

 * Date and Time: Mar 26, 2016 4:48:20 PM 

 * Project Name: CS526_A__HW5_9790_YUGENG_CHANG 


 */ 

$duration = 60 * 60 * 24 * 7;    // 1 weeks in seconds
//$duration = 0;                // per-session cookie
session_set_cookie_params($duration, '/');
session_start();

// Create a cart array if needed
if (empty($_SESSION['shop_cart'])) {
    $_SESSION['shop_cart'] = array();
}

// Create a table of books

echo 'food id is ';
echo $_GET['food_id'];

// Include cart functions
require_once('./models/cart.php');


// Add or update cart as needed
 if ($action == 'update') {
    $new_qty_list = filter_input(INPUT_POST, 'newqty', FILTER_DEFAULT, 
                                     FILTER_REQUIRE_ARRAY);
    foreach ($new_qty_list as $isbn => $qty) {
        if ($_SESSION['shop_cart'][$isbn]['qty'] != $qty) {
            update_book($isbn, $qty);
        }
    }
    include('./views/cart_view.php');
} else if ($action == 'show_cart') {
    include('./views/cart_view.php');
} else  if ($action == 'empty_cart') {
    unset($_SESSION['shop_cart']);
    include('./views/cart_view.php');
}

 
return 'views/cart_view.php';
