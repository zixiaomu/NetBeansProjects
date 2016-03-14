<!DOCTYPE html>

<!-- 


Student Info: Name=YUGENG CHANG, ID=9790

Subject: CS526(A)_HWNo_SPRING_2016

Author: yugengchang 

Filename: index.php 

Date and Time: Feb 26, 2016 6:37:56 PM 

Project Name: PhpProject1 


--> 

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        // put your code here
        $a = new stdClass();
        $b=array("cs470","cs480");
        $a->firstname='leee';
        
       
       foreach($b as $title)
       {
           $a->$title= new stdClass();
           $a->$title ->score=array("1","2");
       }
        var_dump($a);
        ?>
    </body>
</html>
