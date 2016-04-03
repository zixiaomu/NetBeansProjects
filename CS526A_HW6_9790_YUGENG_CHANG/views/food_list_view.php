<?php
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