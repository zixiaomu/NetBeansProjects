<!DOCTYPE html>

<!-- 


Student Info: Name=YUGENG CHANG, ID=9790

Subject: CS526(A)_HWNo_SPRING_2016

Author: yugengchang 

Filename: display_order.php 

Date and Time: Apr 8, 2016 8:00:56 PM 

Project Name: CodeIgniter-OnlineStore 


--> 
<?php echo anchor('shop', 'Countinue Shopping'); ?><br>

<?php echo form_open('shop/display_order'); ?>

<select name="order">

    <?php foreach ($orders_query->result() as $order_row) : ?>
        <option value="<?php echo $order_row->order_id; ?>" > <?php echo 'Order id is :', $order_row->order_id, '    '; ?><?php echo 'Order time : ', date('Y-m-d', $order_row->order_created_at); ?></option>
    <?php endforeach; ?>
</select>
<?php echo form_submit('', 'searh'); ?>
<?php echo form_close(); ?>


<body>

    <h2>Customer ID is : <?php echo $cust_id_number; ?><br /></h2>

    <h2>First Name  : <?php echo $cust_first_name; ?><br /></h2>

    <h2>Last Name  : <?php echo $cust_last_name; ?><br /> </h2>
    <h2>Address :<?php echo $cust_address; ?><br /></h2>

    <table cellpadding="6" cellspacing="1"
           style="width:50%" border="1">
        <tr>
            <th>Quantity</th>
            <th>Description</th>
            <th>Item Price</th>
            <th>Sub-Total</th>
        </tr>
        <?php $i = 1; ?>
        <?php foreach ($details->result()[0] as $items): ?>

            <tr>
                <td><?php echo $items[$i]['qty']; ?>


                </td>
                <td>
                    <?php echo $items['name']; ?>
                    <?php
                    if ($this->cart->has_options($items['rowid']) == TRUE):
                        ?>
                        <p>
                            <?php
                            foreach ($this->cart->product_options(
                                    $items['rowid']) as $option_name => $option_value):
                                ?>
                                <strong><?php echo $option_name; ?>:</strong>
                                <?php echo $option_value; ?><br/>
                            <?php endforeach; ?>
                        </p>
                    <?php endif; ?>
                </td>
                <td><?php
                    echo $this->cart->format_number($items['price']);
                    ?></td>
                <td>$<?php
                echo $this->cart->format_number($items['subtotal']);
                    ?></td>
            </tr>
            <?php $i++; ?>
        <?php endforeach; ?>
        <tr>
            <td colspan="2"> </td>
            <td><strong>Total</strong></td>
            <td>$<?php
        echo $this->cart->format_number($this->cart->total());
        ?></td>
        </tr>
    </table>
</body>