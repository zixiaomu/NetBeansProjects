<?php
/*  


 * Student Info: Name=YUGENG CHANG, ID=9790

 * Subject: CS526(A)_HWNo_SPRING_2016

 * Author: yugengchang 

 * Filename: add to cart.php 

 * Date and Time: Mar 26, 2016 4:48:20 PM 

 * Project Name: CS526_A__HW5_9790_YUGENG_CHANG 


 */ 
$hasFoods = isset($foods);
$hasCategories = isset($categories);
if ($hasFoods === false || $hasCategories === false) {
    echo '<h1>views/food_list_view.php needs $foods</h1>';
    exit();
}
?>

<h1>Managing Your Food</h1>
<div id="sidebar">
    <h2>Categories</h2>
    <?php foreach ($categories as $categorie2) : ?>
        <ul>
            <li>
                <a href="?controller=admin&categorie_id=<?php echo $categorie2->getID(); ?>">
                    <?php echo $categorie2->getName(); ?>
                </a>
            </li>
        </ul>
    <?php endforeach; ?>
</div>
<div id="main">
    <h2><?php echo $categorie->getName(); ?></h2>
    <table>
        <tr>
            <th>ID</th>
            <th>Food Title</th>
            <th>Food Price</th>
            <th>Delete</th>
        </tr>
        <?php foreach ($foods as $food) : ?>
            <tr>
                <td><?php echo $food->getISBN(); ?></td>
                <td><?php echo $food->getTitle(); ?></td>
                <td><?php echo $food->getPrice(); ?></td>
                <td>
                    <form action="?controller=admin&action=delete_food" method="post">
                        <input type="hidden" name="food_id" 
                               value="<?php echo $food->getID(); ?>" />
                        <input type="hidden" name="categorie_id" 
                               value="<?php echo $categorie_id; ?>" />
                        <input type="submit" value="Delete" />
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
    <p><a href="?controller=admin&action=add_food">Add Product</a></p>
</div>