<?php
/*  


 * Student Info: Name=YUGENG CHANG, ID=9790

 * Subject: CS526(A)_HWNo_SPRING_2016

 * Author: yugengchang 

 * Filename: add to cart.php 

 * Date and Time: Mar 26, 2016 4:48:20 PM 

 * Project Name: CS526_A__HW5_9790_YUGENG_CHANG 


 */ 

class Categorie {
    private $id;
    private $name;
    
    public function __construct($id, $name) {
        $this->id = $id;
        $this->name = $name;
    }
    public function getID() {
        return $this->id;
    }
    public function getName() {
        return $this->name;
    }
    public function setID($id) {
        $this->id = $id;
    }
    public function setName($name) {
        $this->name = $name;
    }
}

?>