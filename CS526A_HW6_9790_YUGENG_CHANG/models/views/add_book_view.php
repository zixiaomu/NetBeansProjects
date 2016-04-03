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
        <link rel="stylesheet" type="text/css" href="style.css"/>
    </head>
    <body>
        <header>
            <h1>My Bookstore</h1>
        </header>
        <section id="main">

            <h1>Add Book</h1>
            <form action="." method="post">
                <input type="hidden" name="action" value="add"/>

                <table>
                    <tr>
                        <td>
                            <label>Title:</label>
                        </td>
                        <td>
                            <select name="isbn">
                                <?php
                                foreach ($books as $isbn => $book) :
                                    $price = number_format($book['price'], 2);
                                    $title = $book['title'];
                                    $book = $title . ' ($' . $price . ')';
                                    ?>
                                    <option value="<?php echo $isbn; ?>">
                                        <?php echo $book; ?>
                                    </option>
                                <?php endforeach; ?>

                            </select>
                        </td>
                    </tr>
                    <tr> 
                        <td>
                            <label>Quantity:</label>
                        </td>
                        <td>
                            <select name="bookqty">
                                <?php for ($i = 1; $i <= 10; $i++) : ?>
                                    <option value="<?php echo $i; ?>">
                                        <?php echo $i; ?>
                                    </option>
                                <?php endfor; ?>
                            </select><br />
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                            <input type="submit" value="Add Book"/>
                        </td>
                    </tr>
                </table>
            </form>
            <p><a href=".?action=show_cart">View Cart</a></p>

        </section>
    </body>
</html>
