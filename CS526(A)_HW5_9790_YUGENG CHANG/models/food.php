<?php
/*  


 * Student Info: Name=YUGENG CHANG, ID=9790

 * Subject: CS526(A)_HWNo_SPRING_2016

 * Author: yugengchang 

 * Filename: add to cart.php 

 * Date and Time: Mar 26, 2016 4:48:20 PM 

 * Project Name: CS526_A__HW5_9790_YUGENG_CHANG 


 */ 

class Food {
    private $id, $isbn, $title, $price, $categorie;
    
    public function __construct($isbn, $title, $price, $categorie) {
        $this->isbn = $isbn;
        $this->title = $title;
        $this->price = $price;
        $this->categorie = $categorie;
    }
    
    public function setID($id) {
        $this->id = $id;
    }
    public function getID() {
        return $this->id;
    }
    public function setISBN($isbn) {
        $this->isbn = $isbn;
    }
    public function getISBN() {
        return $this->isbn;
    }
    public function setTitle($title) {
        $this->title = $title;
    }
    public function getTitle() {
        return $this->title;
    }
    public function setPrice($price) {
        $this->price = $price;
    }
    public function getPrice() {
        return $this->price;
    }
    public function getCategorie() {
        return $this->categorie;
    }

    public function setCategorie($categorie) {
        $this->categorie = $categorie;
    }
    public function getFormattedPrice() {
        $formatted_price = number_format($this->price, 2);
        return $formatted_price;
    }
    public function getDiscountedPercentage() {
        $discount_percent = 10;
        return $discount_percent;
    }
    public function getDiscountAmount() {
        $discount_percent = $this->getDiscountedPercentage() / 100;
        $discount_amount = $this->price * $discount_percent;
        $discount_amount = round($discount_amount, 2);
        $discount_amount = number_format($discount_amount, 2);
        return $discount_amount;
    }
    public function getDiscountPrice() {
        $discount_price = $this->price - $this->getDiscountAmount();
        $discount_price = number_format($discount_price, 2);
        return $discount_price;
    }
    public function getImageFilename() {
        $image_filename = $this->isbn.'.png';
        return $image_filename;
    }
    public function getImagePath() {
        $image_path = 'img/'.$this->getImageFilename();
        return $image_path;
    }
    public function getImageAltText() {
        $image_alt = 'Image: '.$this->getImageFilename();
        return $image_alt;
    }
}

?>
