<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
// Add a food to the cart
class car{
public function add_book($isbn, $quantity) {
    global $food;
    if ($quantity < 1) return;

    // If book already exists in cart, update quantity
    if (isset($_SESSION['shop_cart'][$isbn])) {
        
        $quantity += $_SESSION['shop_cart'][$isbn]['qty'];
       car:: update_book($isbn, $quantity);
        return;
    }

    // Add book
    $price =$foods->getPrice();
    $total = $price * $quantity;
    $food = array(
        'title' =>$foods->getTitle() ,
        'price' => $foods->getPrice(),
        'qty'  => $quantity,
        'total' => $total
    );
    $_SESSION['shop_cart'][$isbn] = $book;
}

// Update an book in the cart
 public  function update_book($isbn, $quantity) {
    global $food;
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
public  function get_subtotal() {
    $subtotal = 0;
    foreach ($_SESSION['shop_cart'] as $book) {
        $subtotal += $book['total'];
    }
    $subtotal = number_format($subtotal, 2);
    return $subtotal;
}
}
?>