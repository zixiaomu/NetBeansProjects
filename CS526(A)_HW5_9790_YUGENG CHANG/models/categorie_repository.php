<?php
/*  


 * Student Info: Name=YUGENG CHANG, ID=9790

 * Subject: CS526(A)_HWNo_SPRING_2016

 * Author: yugengchang 

 * Filename: add to cart.php 

 * Date and Time: Mar 26, 2016 4:48:20 PM 

 * Project Name: CS526_A__HW5_9790_YUGENG_CHANG 


 */ 

class CategorieRepository {

    public static function getCategories() {
        global $db;
        $query = "SELECT * FROM categories ORDER BY categorieID";
        $result = $db->query($query);
        $categories = array();
        foreach ($result as $row) {
            $categorie = new Categorie($row['categorieID'], $row['categorieName']);
            $categories[] = $categorie;
        }
        return $categories;
    }

    public static function getCategorie($categorie_id) {
        global $db;
        $query = "SELECT * FROM categories WHERE categorieID = $categorie_id";
        $result = $db->query($query);
        $row = $result->fetch();
        $categorie = new Categorie($row['categorieID'], $row['categorieName']);
        return $categorie;
    }

}
