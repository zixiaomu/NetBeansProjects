<?php
$hasCategories = isset($categories);
if ($hasCategories === false) {
    echo '<h1>views/add_food_view.php needs $categories</h1>';
    exit();
}
?>

<h1>Add Food Page</h1>
<div id="main">
    <form action="?controller=admin&action=add_food" method="post">
        <input type="hidden" name="action" value="add_food" />

        <label>Categorie:</label>
        <select name="categorie_id">
            <?php foreach ($categories as $categorie) : ?>
                <option value="<?php echo $categorie->getID(); ?>">
                    <?php echo $categorie->getName(); ?>
                </option>
            <?php endforeach; ?>
        </select>
        <br />
        <label>ID:</label>
        <input type=text" name="isbn" /> 
        <br />
        <label>Title:</label>
        <input type=text" name="food_title" /> 
        <br />
        <label>Price:</label>
        <input type=text" name="food_price" /> 
        <br />
        <label>&nbsp;</label>
        <input type="submit" value="Add Food" name="addfood_submitted" /> 
        <br />
    </form>
</div>