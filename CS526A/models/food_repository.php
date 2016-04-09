<?php
/*  


 * Student Info: Name=YUGENG CHANG, ID=9790

 * Subject: CS526(A)_HWNo_SPRING_2016

 * Author: yugengchang 

 * Filename: add to cart.php 

 * Date and Time: Mar 26, 2016 4:48:20 PM 

 * Project Name: CS526_A__HW5_9790_YUGENG_CHANG 


 */ 

class FoodRepository {

    public static function getFoods() {
        global $db;
        $query = 'SELECT * FROM foods '
                . 'INNER JOIN categories '
                . 'ON foods.categorieID = '
                . 'categories.categorieID '
                . 'OREDER BY foodID';
        $result = $db->query($query);
        $foods = array();
        foreach ($result as $row) {
            $categorie = new Categorie($row['categorieID'], $row['categorieName']);
            $food = new Food($row['isbn'], $row['foodTitle'], $row['foodPrice'], $categorie);
            $foods[] = $food;
        }
        return $foods;
    }

    public static function getFoodsByCategorie($categorie_id) {
        global $db;
        $categorie = CategorieRepository::getCategorie($categorie_id);
        $query = "SELECT * FROM foods WHERE categorieID = $categorie_id ORDER BY isbn";
        $result = $db->query($query);
        $foods = array();
        foreach ($result as $row) {
            $food = new Food($row['isbn'], $row['foodTitle'], $row['foodPrice'], $categorie);
            $food->setID($row['foodID']);
            $foods[] = $food;
        }
        return $foods;
    }

    public static function getFood($food_id) {
        global $db;
        $query = "SELECT * FROM foods WHERE foodID = $food_id";
        $result = $db->query($query);
        $row = $result->fetch();
        $categorie = CategorieRepository::getCategorie($row['categorieID']);
        $food = new Food($row['isbn'], $row['foodTitle'], $row['foodPrice'], $categorie);
        $food->setID($row['foodID']);
        return $food;
    }

    public static function deleteFood($food_id) {
        global $db;
        $query = "DELETE FROM foods WHERE foodID = $food_id";
        $row_count = $db->exec($query);
        return $row_count;
    }

    public static function addFood($food) {
        global $db;
        $categorie_id = $food->getCategorie()->getID();
        $isbn = $food->getISBN();
        $title = $food->getTitle();
        $price = $food->getPrice();
        $query = "INSERT INTO foods (categorieID, isbn, foodTitle, foodPrice)
            VALUES ('$categorie_id', '$isbn', '$title', '$price')";
        $row_count = $db->exec($query);
        return $row_count;
    }

}
?>

