<?php

// Get the IDs
$food_id = $_POST['food_id'];
$categorie_id = $_POST['categorie_id'];

// Delete the food
FoodRepository::deleteFood($food_id);

// Display the Food List page for the current categorie
header("Location: .?controller=admin&categorie_id=$categorie_id");

