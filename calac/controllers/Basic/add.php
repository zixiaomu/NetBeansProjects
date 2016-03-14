<?php

/*  


 * Student Info: Name=YUGENG CHANG, ID=9790

 * Subject: CS526(A)_HWNo_SPRING_2016

 * Author: yugengchang 

 * Filename: add.php 

 * Date and Time: Mar 11, 2016 7:21:12 PM 

 * Project Name: calac 


 */


    $x= $_POST['x'];
    $y = $_POST['y'];

    // Validate the inputs
    if (empty($x) || empty($y)) {
        $error = "Invalid data. Check all fields and try again.";
        include('../errors/error.php');
    } else {
        $calculator = PublisherRepository::getPublisher($publisher_id);
        $result =  $calcurlator->add();
          
        
        return 'views/calculator_views.php';
        

