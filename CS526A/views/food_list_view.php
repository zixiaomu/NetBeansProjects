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

<h1>Searching Your Food</h1>
<div id="sidebar">
    <h2>Categories</h2>
    <?php foreach ($categories as $categorie2) : ?>
        <ul>
            <li>
                <a href="?controller=guest&categorie_id=<?php echo $categorie2->getID(); ?>">
                    <?php echo $categorie2->getName(); ?>
                </a>
            </li>
        </ul>
    <?php endforeach; ?>
</div>
<div id="main">
    <h2><?php echo $categorie->getName(); ?></h2>
    <ul class="nav">
        <?php foreach ($foods as $food) : ?>
            <li>
                <a href="?controller=guest&action=view_food&food_id=<?php echo $food->getID(); ?>">
                    <?php echo $food->getTitle(); ?>
                </a>
            </li>
        <?php endforeach; ?>
    </ul>
</div>