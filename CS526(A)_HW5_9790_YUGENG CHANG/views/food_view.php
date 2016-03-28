<?php
$hasFood = isset($food);
$hasCategories = isset($categories);
if ($hasFood === false || $hasCategories === false) {
    echo '<h1>views/food_list_view.php needs $food</h1>';
    exit();
}
?>

<h1>Searching Your Food</h1>
<div id="sidebar">
    <h1>Categories</h1>
    <ul class="nav">
        <!-- display links for all categories -->
        <?php foreach ($categories as $categorie) : ?>
            <li>
                <a href="?categorie_id=<?php echo $categorie->getID(); ?>">
                    <?php echo $categorie->getName(); ?>
                </a>
            </li>
        <?php endforeach; ?>
    </ul>
</div>
<div id="main">
    <h1><?php echo $food->getTitle(); ?></h1>
    <div id="left_column">
        <p>
            <img src="<?php echo $food->getImagePath(); ?>"
                 alt="<?php echo $food->getImageAltText(); ?>" />
        </p>
    </div>

    <div id="right_column">
        <p><b>List Price:</b> $<?php echo $food->getFormattedPrice(); ?></p>
        <p><b>Discount:</b> <?php echo $food->getDiscountedPercentage(); ?>%</p>
        <p><b>Your Price:</b> $<?php echo $food->getDiscountPrice(); ?>
            (You save $<?php echo $food->getDiscountAmount(); ?>)</p>
        <form action=?controller=guest&action=add_to_cart method="post">
            <input type="hidden" name="action" value="add" />
            <input type="hidden" name="food_id"
                   value="<?php echo $food->getID(); ?>" />
            <b>Quantity:</b>
            <input id="quantity" type="text" name="quantity" value="1" size="2" />
            <br /><br />
            <input type="submit" value="add_to_cart"/>
        </form>
    </div>
</div>