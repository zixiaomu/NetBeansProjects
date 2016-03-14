<?php

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
