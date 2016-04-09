<?php

/*  


 * Student Info: Name=YUGENG CHANG, ID=9790

 * Subject: CS526(A)_HWNo_SPRING_2016

 * Author: yugengchang 

 * Filename: add to cart.php 

 * Date and Time: Mar 26, 2016 4:48:20 PM 

 * Project Name: CS526_A__HW5_9790_YUGENG_CHANG 


 */ 
// Add a food to the cart
class car{
public function add_book($isbn, $quantity) {
    global $cart;
    if ($quantity < 1) return;

    // If book already exists in cart, update quantity
    if (isset($_SESSION['shop_cart'][$isbn])) {
        $quantity += $_SESSION['shop_cart'][$isbn]['qty'];
        car::update_book($isbn, $quantity);
        return;
    }

    // Add book
    $price = $cart[$isbn]['price'];
    $total = $price * $quantity;
    $book = array(
        'title' => $cart[$isbn]['title'],
        'price' => $price,
        'qty'  => $quantity,
        'total' => $total
    );
    $_SESSION['shop_cart'][$isbn] = $book;
}

// Update an book in the cart
 public function update_book($isbn, $quantity) {
    global $cart;
    $quantity = (int) $quantity;
    if (isset($_SESSION['shop_cart'][$isbn])) {
        if ($quantity <= 0) {
            unset($_SESSION['shop_cart'][$isbn]);
        } else {
            $_SESSION['shop_cart'][$isbn]['qty'] = $quantity;
            $total = $_SESSION['shop_cart'][$isbn]['price'] *
                     $_SESSION['shop_cart'][$isbn]['qty'];
            $_SESSION['shop_cart'][$isbn]['total'] = $total;
        }
    }
}

// Get cart subtotal
public function get_subtotal() {
    $subtotal = 0;
    foreach ($_SESSION['shop_cart'] as $book) {
        $subtotal += $book['total'];
    }
    $subtotal = number_format($subtotal, 2);
    return $subtotal;
}
}
?>