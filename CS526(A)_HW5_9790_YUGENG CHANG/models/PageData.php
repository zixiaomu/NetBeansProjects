<?php
/*  


 * Student Info: Name=YUGENG CHANG, ID=9790

 * Subject: CS526(A)_HWNo_SPRING_2016

 * Author: yugengchang 

 * Filename: add to cart.php 

 * Date and Time: Mar 26, 2016 4:48:20 PM 

 * Project Name: CS526_A__HW5_9790_YUGENG_CHANG 


 */ 
class PageData {
    public $title = "";
    public $content = "";
    public $css = "";
    public $embeddedStyle = "";
    //declare a new property for script elements   
    public $scriptElements = "";
    public $navigation = "";

    //declare a new method for adding Javascript files    
    public function addScript($src) {
        $this->scriptElements .= "<script src='$src'></script>";
    }

    public function addCSS($href) {
        $this->css .= "<link href='$href' rel='stylesheet' />";
    }

}
