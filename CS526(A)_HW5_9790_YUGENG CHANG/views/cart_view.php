<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>My Bookstore</title>
        <link rel="stylesheet" type="text/css" href="./css/style.css"/>
    </head>
    <body>

        <header>
            <h1>My Bookstore</h1>
        </header>
        <section id="main">

            <h1>Your Cart</h1>
            <?php if (!isset($_SESSION['shop_cart']) || count($_SESSION['shop_cart']) == 0) : ?>
                <p>There are no books in your cart.</p>
            <?php else: ?>
                <form action="." method="post">
                    <input type="hidden" name="action" value="update"/>
                    <table>
                        <tr id="cart_header">
                            <th>Book</th>
                            <th>Book Price</th>
                            <th>Quantity</th>
                            <th>Book Total</th>
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
                            <td>$<?php echo get_subtotal(); ?></td>
                        </tr>
                        <tr>
                            <td colspan="4">
                                <input type="submit" value="Update Cart"/>
                            </td>
                        </tr>
                    </table>
                    <p>Click "Update Cart" to update quantities in your
                        cart. Enter a quantity of 0 to remove a book.
                    </p>
                </form>
            <?php endif; ?>
            <p><a href=".?action=show_add_book">Add Book</a></p>
            <p><a href=".?action=empty_cart">Empty Cart</a></p>

        </section>
    </body>
</html>
