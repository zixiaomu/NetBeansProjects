<?php

$categorie_id = 1;
if (isset($_GET['categorie_id'])) {
    $categorie_id = $_GET['categorie_id'];
}
$categories = CategorieRepository::getCategories();
$categorie = CategorieRepository::getCategorie($categorie_id);
$foods = FoodRepository::getFoodsByCategorie($categorie_id);
return 'views/food_list_view.php';

