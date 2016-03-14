<!DOCTYPE html>

<!-- 


Student Info: Name=YUGENG CHANG, ID=9790

Subject: CS526(A)_HWNo_SPRING_2016

Author: yugengchang 

Filename: calter.php 

Date and Time: Mar 11, 2016 7:14:13 PM 

Project Name: calac 


--> 
<?php class Book {
    private $x, $y;
    
    public function __construct($x,$y) {
        $this->x= $x;
        $this->y = $y;
       
    }
    
    public function add()
    {
    return $this->x + $this->y;
    }
          
    public function subtaract()
    {
    return  $this->x - $this->y;
    }
       
}

 
    
    
