<?php

$addFoodSubmitted = isset($_POST['addfood_submitted']);
if ($addFoodSubmitted) {
    $categorie_id = $_POST['categorie_id'];;
    $isbn = $_POST['isbn'];
    $title = $_POST['food_title'];
    $price = $_POST['food_price'];

    // Validate the inputs
    if (empty($isbn) || empty($title) || empty($price)) {
        $error = "Invalid food data. Check all fields and try again.";
        include('../errors/error.php');
    } else {
        $categorie = CategorieRepository::getCategorie($categorie_id);
        $food = new Food($isbn, $title, $price, $categorie);
        FoodRepository::addFood($food);

        // Display the Food List page for the current categorie
        header("Location: .?controller=admin&categorie_id=$categorie_id");
    }
}
else
{
    $categories = CategorieRepository::getCategories();
    return 'views/add_food_view.php';
}
