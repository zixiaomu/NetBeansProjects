<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
/*  


 * Student Info: Name=YUGENG CHANG, ID=9790

 * Subject: CS526(A)_HWNo_SPRING_2016

 * Author: yugengchang 

 * Filename: add to cart.php 

 * Date and Time: Mar 26, 2016 4:48:20 PM 

 * Project Name: CS526_A__HW5_9790_YUGENG_CHANG 


 */ 
-->

<html>
    <head>
        <meta charset="UTF-8">
        <title>My Bookstore</title>
        <link rel="stylesheet" type="text/css" href="./css/style.css"/>
    </head>
    <body>

        <header>
        </header>
        <section id="main">

            <h1>Your Cart</h1>
            <?php if (!isset($_SESSION['shop_cart']) || count($_SESSION['shop_cart']) == 0) : ?>
                <p>There are no foods in your cart.</p>
            <?php else: ?>
                <form action="?controller=guest&action=add" method="post">
                    <input type="hidden" name="action" value="update"/>
                    <table>
                        <tr id="cart_header">
                            <th>Food</th>
                            <th>Food Price</th>
                            <th>Quantity</th>
                            <th>Food Total</th>
                        </tr>

                        <?php
                        foreach ($_SESSION['shop_cart'] as $isbn => $book) :
                            $price = number_format($book['price'], 2);
                            $total = number_format($book['total'], 2);
                            ?>
                            <tr>
                                <td>
                                    <?php echo $book['title']; ?>
                                </td>
                                <td>
                                    $<?php echo $price; ?>
                                </td>
                                <td>
                                    <input type="text"
                                           name="newqty[<?php echo $isbn; ?>]"
                                           value="<?php echo $book['qty']; ?>"/>
                                </td>
                                <td>
                                    $<?php echo $total; ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                        <tr>
                            <td colspan="3"><b>Subtotal</b></td>
                            <td>$<?php echo car::get_subtotal(); ?></td>
                        </tr>
                        <tr>
                            <td colspan="4">
                             <!--   <input type="submit" value="Update Cart"/>-->
                            </td>
                        </tr>
                    </table>
                     <!--  <p>Click "Update Cart" to update quantities in your
                        cart. Enter a quantity of 0 to remove a book.-->
                    </p>
                </form>
            <?php endif; ?>
            <p><a href=".?action=empty_cart">Empty Cart</a></p>

        </section>
    </body>
</html>
